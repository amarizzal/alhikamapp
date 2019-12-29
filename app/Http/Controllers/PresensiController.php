<?php

namespace App\Http\Controllers;

use App\DataTables\PresensiDataTable;
use App\Http\Requests\CreatePresensiRequest;
use App\Http\Requests\UpdatePresensiRequest;
use App\Imports\PresensiImport;
use App\Models\Denda;
use App\Models\DendaDetail;
use App\Models\Presensi;
use App\Repositories\JadwalKegiatanRepository;
use App\Repositories\PresensiRepository;
use Flash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Response;

class PresensiController extends AppBaseController
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

    /**
     * Display a listing of the Presensi.
     *
     * @param PresensiDataTable $presensiDataTable
     * @return Response
     */
    public function index(PresensiDataTable $presensiDataTable)
    {
//        return $presensiDataTable->render('presensis.index');
        $presensi = Presensi::select('tanggal', 'id')->with('jadwalkegiatan.kegiatan')->groupBy('tanggal')
            ->orderBy('tanggal', 'desc')->get()->toArray();
        return view('presensis.index', compact('presensi'));
    }

    /**
     * Show the form for creating a new Presensi.
     *
     * @return Response
     */
    public function create()
    {
        $jadwalKegiatan = $this->jadwalKegiatanRepository->with(['kegiatan'])->orderBy('tanggal', 'desc')->get();
        return view('presensis.create', compact('jadwalKegiatan'));
    }

    /**
     * Store a newly created Presensi in storage.
     *
     * @param CreatePresensiRequest $request
     *
     * @return Response
     */
    public function store(CreatePresensiRequest $request)
    {
        $input = $request->all();

        Excel::import(new PresensiImport($input), $input['file']);

//        $presensi = $this->presensiRepository->create($input);

        Flash::success('Presensi saved successfully.');

        return redirect(route('presensis.index'));
    }

    /**
     * Display the specified Presensi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, PresensiDataTable $presensiDataTable)
    {
        $presensi = $this->presensiRepository->where('tanggal', $id)->first();

        if (empty($presensi)) {
            Flash::error('Presensi not found');

            return redirect(route('presensis.index'));
        }

//        return view('presensis.show')->with('presensi', $presensi);
        return $presensiDataTable->render('presensis.show', compact('presensi'));
    }

    /**
     * Show the form for editing the specified Presensi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($tanggal, $id)
    {
        $presensi = Presensi::where(['tanggal' => $tanggal, 'nik' => $id])->first();
        if (empty($presensi)) {
            Flash::error('Presensi not found');

            return redirect(route('presensis.index'));
        }

        return view('presensis.edit')->with('presensi', $presensi);
    }

    /**
     * Update the specified Presensi in storage.
     *
     * @param  int              $id
     * @param UpdatePresensiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePresensiRequest $request)
    {
        try {
            DB::beginTransaction();

            $presensi = $this->presensiRepository->with(['jadwalkegiatan.kegiatan'])->find($id);

            if (empty($presensi)) {
                Flash::error('Presensi not found');

                return redirect(route('presensis.index'));
            }

            $this->presensiRepository->update($request->all(), $id);

            $denda = Denda::where('nik', $presensi->nik)->first();

            $denda_detail = DendaDetail::where(['denda_id' => $denda->id, 'tgl' => $presensi->tanggal])->first();

            if ($request->izin == 0 || $request->izin == 1) {
                $newDenda = $denda->total_denda - $presensi->jadwalkegiatan->kegiatan->harga_denda;

                $denda->update([
                    'total_denda' => $newDenda
                ]);

                $denda_detail->update([
                    'denda' => 0,
                    'status' => 2,
                ]);

            } else if ($request->izin == 2) {
                $newDenda = $denda->total_denda + $presensi->jadwalkegiatan->kegiatan->harga_denda;

                $denda->update([
                    'total_denda' => $newDenda
                ]);

                $denda_detail->update([
                    'denda' => $presensi->jadwalkegiatan->kegiatan->harga_denda,
                    'status' => 0,
                ]);
            }

            Flash::success('Presensi updated successfully.');

            DB::commit();
            return redirect(route('presensis.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified Presensi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $presensi = $this->presensiRepository->with(['jadwalkegiatan.kegiatan'])->where('tanggal', $id);
            $dataPresensi = $presensi->get();

            if (empty($presensi)) {
                Flash::error('Presensi not found');

                return redirect(route('presensis.index'));
            }

            foreach ($dataPresensi as $data) {

                $denda = Denda::where('nik', $data->nik)->first();
                $denda_detail = DendaDetail::where('tgl', $data->tanggal)->delete();

                $newDenda = ($denda->total_denda - $data->jadwalkegiatan->kegiatan->harga_denda);

                $denda->update([
                    'total_denda' => $newDenda,
                ]);

            }

            Flash::success('Presensi deleted successfully.');

            $presensi->delete();
            DB::commit();
            return redirect(route('presensis.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
