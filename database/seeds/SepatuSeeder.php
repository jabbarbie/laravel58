<?php

use Illuminate\Database\Seeder;

class SepatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('sepatu')->insert([
            [
                'kode_barang'=> 'ADS01',
                'nama'  => 'Adidas',
                'harga' => 900000,
                'stok'  => 9,
                'ukuran' => 40
            ],
            [
                'kode_barang'   => 'CVR22',
                'nama'  => 'Converse',
                'harga' => 102000,
                'stok'  => 8,
                'ukuran' => 41
            ]
        ]);

    }
}
