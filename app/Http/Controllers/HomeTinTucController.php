<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinTuc;

class HomeTinTucController extends Controller
{
    public function index()
    {
        $tintuc = TinTuc::orderBy('id', 'desc')->get();
        return view('home.tintuc', compact('tintuc'));
    }
public function show($id)
{
    $tin = TinTuc::findOrFail($id); // tìm tin theo ID
    return view('home.tintuc_chitiet', compact('tin'));
}



}
