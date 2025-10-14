<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebook;

class HomeEbookController extends Controller
{
    // Trang danh sách Ebook
    public function index()
    {
        $ebook = Ebook::orderBy('id', 'desc')->get();
        return view('home.ebook', compact('ebook'));
    }

    // Trang chi tiết Ebook
    public function show($id)
    {
        $ebook = Ebook::findOrFail($id);
        return view('home.ebook_show', compact('ebook'));
    }
}
