<?php

namespace App\Imports;

use App\Models\Denda;
use App\Models\User;
use App\Models\Santri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class SantriImport implements ToCollection, WithChunkReading
{

    /**
     * @inheritDoc
     */
    public function collection(Collection $collection)
    {
        try {
            DB::beginTransaction();

            foreach ($collection as $row) {
                // create santri account
                $user = User::create([
                    'username' => $row[0],
                    'password' => bcrypt($row[0]),
                    'role_id' => 2
                ]);
                // create denda for santri
                $denda = Denda::create([
                    'nik' => $row[0],
                    'total_denda' => 0,
                ]);
////
                $santri = Santri::create([
                    'nik' => $row[0],
                    'nama' => $row[1],
                    'kelamin' => $row[2],
                    'kategori' => $row[3],
                    'angkatan' => $row[4]
                ]);
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

