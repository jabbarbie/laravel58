<?php

use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggan')->insert([
            [
            'nama'  => 'Aditya Ramadhan',
            'alamat' => 'Jl. Laravel No. 58'
            ],
            [
            'nama'  => 'Siska Dinda Oktaviana',
            'alamat' => 'Jl. Laravel No. 58'
            ],
            [
            'nama'  => 'Nadia Indira Hanjani Putri',
            'alamat' => 'Jl. Laravel No. 58'
            ],
            [
            'nama'  => 'Farhani Kamilah Allalaby',
            'alamat' => 'Jl. Laravel No. 58'
            ],            
        ]);
    }
}
