<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:150'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'deskripsi_singkat' => ['required', 'string', 'max:500'],
            'deskripsi_lengkap' => ['required', 'string'],
            'fitur' => ['required', 'string'],
        ]);

        $validated['fitur'] = $this->parseFitur($validated['fitur']);
        $validated['gambar'] = $this->uploadImage($request, 'gambar', 'uploads/products');

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:150'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'deskripsi_singkat' => ['required', 'string', 'max:500'],
            'deskripsi_lengkap' => ['required', 'string'],
            'fitur' => ['required', 'string'],
        ]);

        $validated['fitur'] = $this->parseFitur($validated['fitur']);

        if ($request->hasFile('gambar')) {
            $this->deletePublicFile($product->gambar);
            $validated['gambar'] = $this->uploadImage($request, 'gambar', 'uploads/products');
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $this->deletePublicFile($product->gambar);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    private function parseFitur(string $fitur): array
    {
        return collect(preg_split('/\r\n|\r|\n/', $fitur))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values()
            ->all();
    }

    private function uploadImage(Request $request, string $field, string $folder): ?string
    {
        if (! $request->hasFile($field)) {
            return null;
        }

        $file = $request->file($field);
        $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $filename);

        return $folder . '/' . $filename;
    }

    private function deletePublicFile(?string $path): void
    {
        if ($path && ! str_starts_with($path, 'img/') && File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
