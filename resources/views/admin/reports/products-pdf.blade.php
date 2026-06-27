<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Produk dan Layanan</title>
    <style>
        @page { margin: 24px 28px; }
        * { box-sizing: border-box; }
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            color: #222;
            font-size: 10px;
            line-height: 1.35;
        }
        .header {
            width: 100%;
            border-bottom: 3px solid #0d6efd;
            padding-bottom: 12px;
            margin-bottom: 18px;
        }
        .brand {
            font-size: 24px;
            font-weight: bold;
            color: #0d6efd;
            letter-spacing: 1px;
        }
        .subtitle { font-size: 13px; margin-top: 3px; color: #444; }
        h1 {
            margin: 0 0 12px 0;
            text-align: center;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: .4px;
        }
        .meta-table {
            width: 100%;
            margin-bottom: 14px;
            border-collapse: collapse;
        }
        .meta-table td { padding: 3px 0; vertical-align: top; }
        .meta-label { width: 115px; font-weight: bold; }
        table.report {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            table-layout: fixed;
        }
        table.report th, table.report td {
            border: 1px solid #777;
            padding: 7px 6px;
            vertical-align: top;
        }
        table.report th {
            background: #eaf2ff;
            color: #111;
            text-align: center;
            font-weight: bold;
        }
        .number { width: 35px; text-align: center; }
        .image-col { width: 105px; text-align: center; }
        .product-name { width: 150px; font-weight: bold; }
        .description-col { width: 255px; }
        .feature-col { width: 190px; }
        .product-image {
            width: 86px;
            height: 62px;
            object-fit: cover;
            border: 1px solid #d5d5d5;
            padding: 2px;
        }
        .no-image {
            display: block;
            color: #777;
            font-size: 9px;
            margin-top: 20px;
        }
        .features { margin: 0; padding-left: 13px; }
        .text-center { text-align: center; }
        .signature-table { width: 100%; margin-top: 32px; border-collapse: collapse; }
        .signature-table td { width: 50%; text-align: center; vertical-align: top; padding-top: 6px; }
        .signature-space { height: 54px; }
        .footer { margin-top: 18px; font-size: 9px; color: #555; text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <div class="brand">BCA</div>
        <div class="subtitle">Project Company Profile BCA</div>
    </div>

    <h1>Laporan Data Produk dan Layanan</h1>

    <table class="meta-table">
        <tr><td class="meta-label">Tanggal Cetak</td><td>: {{ $tanggalCetak }}</td></tr>
        <tr><td class="meta-label">Jumlah Data</td><td>: {{ $products->count() }} produk/layanan</td></tr>
        <tr><td class="meta-label">Dicetak Oleh</td><td>: Administrator</td></tr>
    </table>

    <table class="report">
        <thead>
            <tr>
                <th class="number">No</th>
                <th class="image-col">Gambar</th>
                <th class="product-name">Nama Produk</th>
                <th class="description-col">Deskripsi Singkat</th>
                <th class="feature-col">Fitur/Layanan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td class="number">{{ $loop->iteration }}</td>
                    <td class="image-col">
                        @if(! empty($product->pdf_image_src))
                            <img class="product-image" src="{{ $product->pdf_image_src }}" alt="{{ $product->nama }}">
                        @else
                            <span class="no-image">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td class="product-name">{{ $product->nama }}</td>
                    <td class="description-col">{{ $product->deskripsi_singkat }}</td>
                    <td class="feature-col">
                        @php
                            $features = is_array($product->fitur) ? $product->fitur : json_decode($product->fitur ?? '[]', true);
                            $features = is_array($features) ? $features : [];
                        @endphp
                        @if(count($features) > 0)
                            <ul class="features">
                                @foreach($features as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Belum ada data produk.</td></tr>
            @endforelse
        </tbody>
    </table>

    <table class="signature-table">
        <tr>
            <td></td>
            <td>
                Tangerang, {{ $tanggalCetakSingkat }}<br>
                Administrator
                <div class="signature-space"></div>
                <strong>Admin Project</strong>
            </td>
        </tr>
    </table>

    <div class="footer">Dokumen ini dicetak otomatis melalui sistem backend Company Profile BCA.</div>
</body>
</html>
