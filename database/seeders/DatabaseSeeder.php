<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\equipment;
use App\Models\LoanRequest;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ===== Akun pengelola basis data persisten  =====
        // Password otomatis di-hash karena Model User punya cast 'hashed'
        User::create([
            'name'     => 'persisten',
            'email'    => 'rekayasaperangkatlunak@del.ac.id',
            'password' => 'password123',
        ]);

        // ===== 3 kategori  =====
        $kategoris = [
            ['kode_kategori' => 'SC', 'nama_kategori' => 'Server & Cloud'],
            ['kode_kategori' => 'IOT', 'nama_kategori' => 'Internet of 
Things'],
            ['kode_kategori' => 'MD', 'nama_kategori' => 'Multimedia & Drone'],
           
        ];
        foreach ($kategoris as $k) {
            Kategori::create($k);
        }

        
    }
}