<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\CompanyProfile;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'fandy12345@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('fandy12345'),
            ]
        );

        CompanyProfile::updateOrCreate(['id' => 1], [
            'nama_perusahaan' => 'PT Bank Central Asia Tbk',
            'tagline' => 'Senantiasa di Sisi Anda',
            'deskripsi' => 'PT Bank Central Asia Tbk (BCA) merupakan salah satu bank swasta nasional yang menyediakan layanan perbankan, solusi transaksi digital, pembiayaan, dan layanan finansial untuk mendukung kebutuhan nasabah individu maupun bisnis.',
            'visi' => 'Menjadi bank pilihan utama andalan masyarakat, yang berperan sebagai pilar penting perekonomian Indonesia.',
            'misi' => "Membangun institusi yang unggul di bidang penyelesaian pembayaran dan solusi keuangan.\nMemahami beragam kebutuhan nasabah dan memberikan layanan finansial yang tepat.\nMeningkatkan nilai perusahaan dan nilai stakeholder BCA.",
            'alamat' => 'Menara BCA, Grand Indonesia, Jl. MH Thamrin No. 1, Jakarta',
            'telepon' => '1500888',
            'email' => 'halobca@bca.co.id',
            'logo' => 'img/logobca.png',
        ]);

        $this->call(ProductSeeder::class);

        $articles = [
            [
                'title' => 'Kemudahan Transaksi Digital untuk Nasabah',
                'excerpt' => 'Layanan digital membantu nasabah melakukan transaksi dengan lebih cepat, aman, dan praktis.',
                'content' => 'BCA terus menghadirkan layanan digital untuk mendukung kebutuhan transaksi harian nasabah. Melalui inovasi digital, nasabah dapat melakukan pembayaran, transfer, dan pengelolaan keuangan secara lebih praktis.',
                'image' => null,
                'status' => 'published',
                'published_at' => now(),
            ],
            [
                'title' => 'Tips Aman Menggunakan Layanan Perbankan Online',
                'excerpt' => 'Keamanan data menjadi hal penting ketika menggunakan layanan perbankan berbasis internet.',
                'content' => 'Nasabah perlu menjaga kerahasiaan password, mengganti PIN secara berkala, serta memastikan akses layanan dilakukan melalui kanal resmi. Langkah sederhana ini membantu mengurangi risiko penyalahgunaan akun.',
                'image' => null,
                'status' => 'published',
                'published_at' => now(),
            ],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(
                ['title' => $article['title']],
                array_merge($article, ['slug' => Str::slug($article['title']) . '-' . Str::random(5)])
            );
        }

        $galleries = [
            ['title' => 'Layanan Tabungan', 'description' => 'Ilustrasi layanan tabungan BCA.', 'image' => 'img/tahapan.jpg'],
            ['title' => 'Kartu Kredit', 'description' => 'Produk kartu kredit untuk kebutuhan transaksi.', 'image' => 'img/kartukredit.png'],
            ['title' => 'Kredit Pemilikan Rumah', 'description' => 'Solusi pembiayaan rumah.', 'image' => 'img/kpr.jpg'],
        ];

        foreach ($galleries as $gallery) {
            Gallery::updateOrCreate(['title' => $gallery['title']], $gallery);
        }
    }
}
