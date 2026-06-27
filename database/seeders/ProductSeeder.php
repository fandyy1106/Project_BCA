<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'nama' => 'Tahapan BCA',
                'gambar' => 'img/tahapan.jpg',
                'deskripsi_singkat' => 'Tabungan praktis untuk kenyamanan hidup Anda.',
                'deskripsi_lengkap' => 'Tahapan BCA hadir untuk memberikan kemudahan bertransaksi di manapun dan kapanpun. Dilengkapi dengan berbagai fitur digital yang memudahkan hidup Anda.',
                'fitur' => ['ATM 24 Jam', 'Mobile Banking', 'Debit Contactless'],
            ],
            [
                'nama' => 'Kartu Kredit Black',
                'gambar' => 'img/kartukredit.png',
                'deskripsi_singkat' => 'Eksklusivitas dalam setiap transaksi Anda.',
                'deskripsi_lengkap' => 'Nikmati berbagai keistimewaan seperti akses airport lounge, poin reward berlipat, dan layanan prioritas di seluruh dunia.',
                'fitur' => ['Priority Service', 'Travel Insurance', 'Point Reward'],
            ],
            [
                'nama' => 'KPR BCA',
                'gambar' => 'img/kpr.jpg',
                'deskripsi_singkat' => 'Wujudkan rumah impian Anda sekarang juga.',
                'deskripsi_lengkap' => 'KPR BCA memberikan solusi pembiayaan hunian yang mudah, aman, dengan pilihan suku bunga yang kompetitif dan jangka waktu yang fleksibel.',
                'fitur' => ['Bunga Kompetitif', 'Proses Cepat & Mudah', 'Jangka Waktu Hingga 20 Tahun'],
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['nama' => $product['nama']], $product);
        }
    }
}
