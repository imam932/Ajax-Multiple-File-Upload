<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
      return view('welcome');
    }

    public function store( Request $request)
    {
      $request->validate([
          'file_name' => 'image|mimes:jpg,jpeg,png,gif,bmp',
          'title'     => 'required'
      ]);

      // menampilkan pesan
      dd('Ready to Upload');
    }
}
