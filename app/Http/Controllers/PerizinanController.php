<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use App\Models\DendaDetail;
use App\Models\JadwalKegiatan;
use App\Models\Presensi;
use App\Models\Santri;
use App\Repositories\JadwalKegiatanRepository;
use App\Repositories\PresensiRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class PerizinanController extends Controller
{
    /** @var  PresensiRepository */
    private $presensiRepository;

    /** @var  JadwalKegiatanRepository */
    private $jadwalKegiatanRepository;

    public function __construct(PresensiRepository $presensiRepo, JadwalKegiatanRepository $jadwalKegiatanRepository)
    {
        $this->presensiRepository = $presensiRepo;
        $this->jadwalKegiatanRepository = $jadwalKegiatanRepository;
    }

    public function index() {
        $santri = Santri::get()->toArray();
        $jadwalKegiatan = JadwalKegiatan::with('kegiatan')->orderBy('tanggal', 'desc')->get()->toArray();
        return view('perizinan.index', compact('santri', 'jadwalKegiatan'));
    }

    public function store(Request $request) {
        try {
            DB::beginTransaction();


            $presensi = Presensi::with(['jadwalkegiatan.kegiatan'])->where([
                'tanggal' => $request->tanggal])->whereIn('nik', $request->nik)->get();

            if (empty($presensi)) {
                Flash::error('Presensi not found');

                return redirect(route('presensis.index'));
            }

            foreach ($presensi as $data) {
                $data->update([
                    'tanggal' => $request->tanggal,
                    'izin' => $request->izin
                ]);

                $denda = Denda::where('nik', $data->nik)->first();
                $denda_detail = DendaDetail::where(['denda_id' => $denda->id, 'tgl' => $data->tanggal])->first();

                if ($request->izin == 0 || $request->izin == 1) {
                    $newDenda = $denda->total_denda - $data->jadwalkegiatan->kegiatan->harga_denda;

                    $denda->update([
                        'total_denda' => $newDenda
                    ]);

                    $denda_detail->update([
                        'denda' => 0,
                        'status' => 2,
                    ]);

                } else if ($request->izin == 2) {
                    $newDenda = $denda->total_denda + $data->jadwalkegiatan->kegiatan->harga_denda;

                    $denda->update([
                        'total_denda' => $newDenda
                    ]);

                    $denda_detail->update([
                        'denda' => $data->jadwalkegiatan->kegiatan->harga_denda,
                        'status' => 0,
                    ]);
                }

            }

            Flash::success('Perizinan successfully.');

            DB::commit();
            return redirect(route('perizinan.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
