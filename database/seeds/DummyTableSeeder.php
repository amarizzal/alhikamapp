<?php

use Illuminate\Database\Seeder;

class DummyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataRoles = ['admin', 'santri'];
        foreach ($dataRoles as $data) {
            \App\Models\Role::create(['name' => $data]);
        }

        \App\Models\User::create(['username'=>'admin', 'password'=> bcrypt('admin'), 'role_id' => 1]);
    }
}
