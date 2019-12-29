<?php

namespace App\Imports;

use App\Models\Denda;
use App\Models\DendaDetail;
use App\Models\JadwalKegiatan;
use App\Models\Presensi;
use App\Models\Santri;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class PresensiImport implements ToCollection, WithChunkReading
{
    protected $input;

    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * @inheritDoc
     */
    public function collection(Collection $collection)
    {
        try {
            //delete header of excel
            DB::beginTransaction();

            $jadwalKegiatan = JadwalKegiatan::with('kegiatan')->find($this->input['jadwalKegiatan_id']);

            unset($collection[0]);
            unset($collection[1]);

            $santri = Santri::select('nik')->get()->toArray();
            foreach ($santri as $data) {
                $denda = Denda::where('nik', $data['nik'])->first();
                $status = false;
                $tempItem = null;

                foreach ($collection as $item) {
                    if ($data['nik'] == $item[1]) {
                        $status = true;
                        $tempItem = $item; // simpan data presensi untuk di luar perulangan
                    }
                }

                // jika true maka exekusi presensi
                if ($status) {
                   $presensi =  Presensi::create([
                        'nik' => $tempItem[1], // NIP
                        'tanggal' => date('Y-m-d', strtotime($jadwalKegiatan->tanggal)), // tanggal
                        'masuk' => $tempItem[7],
                        'keluar' => ($tempItem[8] != null ? $tempItem[8] : ""),
                        'izin' => 0,
                        'keterangan' => "hadir"
                    ]);

                    $dendaDetail = DendaDetail::create([
                        'tgl' => date('Y-m-d', strtotime($jadwalKegiatan->tanggal)),
                        'denda' => 0,
                        'denda_id' => $denda->id,
                        'jadwalkegiatan_id' => $jadwalKegiatan->id,
                        'status' => 2,
                    ]);
                } else { // jika tidak ada absensi maka santri otomatis masuk denda
                    // jika santri tidak terdaftar data di table denda
//                    if (count($denda) == 0) {
//                        $denda = Denda::create([
//                            'nik' => $data['nik'],
//                            'total_denda' => 0
//                        ]);
//                    }

                    // jika santri tidak ada dalam presensi maka akan tetap dibuatkan presensi
                    // dengan keterangan tidak hadir
                    $presensi = Presensi::create([
                        'nik' => $data['nik'], // NIPs
                        'tanggal' => date('Y-m-d', strtotime($jadwalKegiatan->tanggal)), // tanggal
                        'masuk' => null,
                        'keluar' => null,
                        'izin' => 2,
                        'keterangan' => "tidak hadir"
                    ]);

                    $totalDenda = $denda->total_denda;
                    $totalDendaTerbaru = ($totalDenda + $jadwalKegiatan->kegiatan->harga_denda);

                    // insert data detail denda
                    $dendaDetail = DendaDetail::create([
                        'denda_id' => $denda->id,
                        'tgl' => date('Y-m-d', strtotime($jadwalKegiatan->tanggal)),
                        'denda' => $jadwalKegiatan->kegiatan->harga_denda,
                        'jadwalkegiatan_id' => $jadwalKegiatan->id,
                        'status' => 0,
                    ]);

                    $denda->update([
                        'total_denda' => $totalDendaTerbaru
                    ]);
                }
            }
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }

    }

    /**
     * @inheritDoc
     */
    public function chunkSize(): int
    {
        return 1000;
    }
}
