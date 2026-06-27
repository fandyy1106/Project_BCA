<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CompanyProfile;
use App\Models\Gallery;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'productCount' => Product::count(),
            'articleCount' => Article::count(),
            'galleryCount' => Gallery::count(),
            'profileCount' => CompanyProfile::count(),
            'latestArticles' => Article::latest()->take(5)->get(),
            'latestProducts' => Product::latest()->take(5)->get(),
        ]);
    }
}
