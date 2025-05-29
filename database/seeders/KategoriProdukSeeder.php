<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus semua data dari tabel
        // DB::table('kategori_produk')->truncate();

        DB::table('kategori_produk')->insert([
            [
                'slug' => Str::slug('Makanan'),
                'nama_kategori' => 'Makanan',
                'deskripsi' => 'Produk makanan seperti makanan ringan, makanan berat, dan lainnya.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => Str::slug('Minuman'),
                'nama_kategori' => 'Minuman',
                'deskripsi' => 'Produk minuman seperti teh, kopi, jus, dan lainnya.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => Str::slug('Cemilan'),
                'nama_kategori' => 'Cemilan',
                'deskripsi' => 'Cemilan seperti keripik, biskuit, coklat, dan lainnya.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}