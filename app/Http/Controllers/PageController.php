<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CompanyProfile;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home', [
            'articles' => Article::where('status', 'published')->latest()->take(3)->get(),
            'galleries' => Gallery::latest()->take(6)->get(),
        ]);
    }

    public function product()
    {
        $products = Product::latest()->get();
        return view('product', compact('products'));
    }

    public function productDetail($id)
    {
        $product = Product::findOrFail($id);
        return view('product-detail', compact('product'));
    }

    public function about()
    {
        $profile = CompanyProfile::first();
        return view('about', compact('profile'));
    }

    public function contact()
    {
        $profile = CompanyProfile::first();
        return view('contact', compact('profile'));
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'min:3', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'pesan' => ['required', 'string', 'min:10'],
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'pesan.required' => 'Pesan tidak boleh kosong.',
            'pesan.min' => 'Pesan minimal 10 karakter.',
        ]);

        return back()->with('success', 'Terima kasih, ' . $request->nama . '! Pesan Anda berhasil dikirim.');
    }
}
