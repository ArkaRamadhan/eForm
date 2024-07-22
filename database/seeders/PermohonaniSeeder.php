<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class PermohonaniSeeder extends Seeder
{
/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');

    	for($i = 1; $i <= 20; $i++){

    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('permohonans')->insert([
    			'nama' => $faker->name,
    			'nama_ibu' => $faker->email,
    			'cabang' => $faker->address,
    			'jabatan' => 'meneger',
    			'no_telp' => $faker->phoneNumber,
    			'alasan' => $faker->name,
    			'pendaftaran' => 'pengajuan',
    		]);

    	}
    }
}
