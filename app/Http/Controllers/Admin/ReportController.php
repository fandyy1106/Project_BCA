<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ReportController extends Controller
{
    public function productsPdf()
    {
        $products = Product::orderBy('nama')->get()->map(function ($product) {
            $product->pdf_image_src = $this->makePdfImageSource($product->gambar);
            return $product;
        });

        $data = [
            'products' => $products,
            'tanggalCetak' => now()->format('d-m-Y H:i'),
            'tanggalCetakSingkat' => now()->format('d-m-Y'),
        ];

        if (class_exists(\Barryvdh\DomPDF\Facade\Pdf::class)) {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.reports.products-pdf', $data)
                ->setPaper('a4', 'landscape')
                ->setOptions([
                    'isHtml5ParserEnabled' => true,
                    'isRemoteEnabled' => true,
                    'isFontSubsettingEnabled' => true,
                ]);

            return $pdf->stream('laporan-produk-bca.pdf');
        }

        return response($this->makeSimplePdfWithoutImages($data), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="laporan-produk-bca.pdf"',
        ]);
    }

    private function makePdfImageSource(?string $imagePath): ?string
    {
        if (! $imagePath) {
            return null;
        }

        $imagePath = trim(str_replace('\\', '/', $imagePath));
        $imagePath = ltrim($imagePath, '/');

        $candidatePaths = [
            public_path($imagePath),
            public_path('storage/' . $imagePath),
            storage_path('app/public/' . $imagePath),
        ];

        if (str_starts_with($imagePath, 'storage/')) {
            $withoutStorage = substr($imagePath, strlen('storage/'));
            $candidatePaths[] = public_path($imagePath);
            $candidatePaths[] = storage_path('app/public/' . $withoutStorage);
        }

        foreach ($candidatePaths as $path) {
            if (File::exists($path) && File::isFile($path)) {
                $mimeType = File::mimeType($path) ?: 'image/jpeg';

                if (! in_array($mimeType, ['image/jpeg', 'image/png', 'image/jpg'])) {
                    return null;
                }

                return 'data:' . $mimeType . ';base64,' . base64_encode(File::get($path));
            }
        }

        return null;
    }

    private function makeSimplePdfWithoutImages(array $data): string
    {
        $products = $data['products'];
        $content = [];

        $content[] = 'BT /F2 18 Tf 34 790 Td (LAPORAN DATA PRODUK DAN LAYANAN) Tj ET';
        $content[] = 'BT /F1 10 Tf 34 768 Td (Project Company Profile BCA) Tj ET';
        $content[] = 'BT /F1 10 Tf 34 752 Td (Tanggal Cetak: ' . $this->escapePdfText($data['tanggalCetak']) . ') Tj ET';
        $content[] = 'BT /F1 10 Tf 34 736 Td (Jumlah Data: ' . $products->count() . ' produk/layanan) Tj ET';

        $y = 705;
        foreach ($products as $index => $product) {
            $line = ($index + 1) . '. ' . $product->nama . ' - ' . $product->deskripsi_singkat;
            $content[] = 'BT /F1 9 Tf 34 ' . $y . ' Td (' . $this->escapePdfText($line) . ') Tj ET';
            $y -= 18;
        }

        return $this->buildPdf(implode("\n", $content));
    }

    private function buildPdf(string $content): string
    {
        $objects = [];
        $objects[] = '1 0 obj << /Type /Catalog /Pages 2 0 R >> endobj';
        $objects[] = '2 0 obj << /Type /Pages /Kids [3 0 R] /Count 1 >> endobj';
        $objects[] = '3 0 obj << /Type /Page /Parent 2 0 R /MediaBox [0 0 595 842] /Resources << /Font << /F1 4 0 R /F2 5 0 R >> >> /Contents 6 0 R >> endobj';
        $objects[] = '4 0 obj << /Type /Font /Subtype /Type1 /BaseFont /Helvetica >> endobj';
        $objects[] = '5 0 obj << /Type /Font /Subtype /Type1 /BaseFont /Helvetica-Bold >> endobj';
        $objects[] = '6 0 obj << /Length ' . strlen($content) . " >> stream\n" . $content . "\nendstream endobj";

        $pdf = "%PDF-1.4\n";
        $offsets = [0];

        foreach ($objects as $object) {
            $offsets[] = strlen($pdf);
            $pdf .= $object . "\n";
        }

        $xrefOffset = strlen($pdf);
        $pdf .= "xref\n0 " . (count($objects) + 1) . "\n";
        $pdf .= "0000000000 65535 f \n";

        for ($i = 1; $i <= count($objects); $i++) {
            $pdf .= str_pad((string) $offsets[$i], 10, '0', STR_PAD_LEFT) . " 00000 n \n";
        }

        $pdf .= "trailer << /Size " . (count($objects) + 1) . " /Root 1 0 R >>\n";
        $pdf .= "startxref\n" . $xrefOffset . "\n%%EOF";

        return $pdf;
    }

    private function escapePdfText(string $text): string
    {
        $text = str_replace(["\r", "\n"], ' ', $text);
        return str_replace(['\\', '(', ')'], ['\\\\', '\\(', '\\)'], $text);
    }
}
