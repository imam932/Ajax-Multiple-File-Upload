<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

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

      // mendeklarasikan Model Image
      $image = new Image();
       // menampung dari request form
       $image->title      = $request->title;
       $image->file_name  = $this->uploadFile($request); // mengambil dari method dan berisi object $request
       $image->save(); //menyimpan ke database

       return redirect('/')->with('message', 'Your Image Successfully Uploaded!');
    }

    protected function uploadFile($request)
    {
      if ($request->hasFile('file_name'))
      {
          $image = $request->file('file_name');
          $fileName = $image->getClientOriginalName(); //mengambil nama file yg di upload
          $destination = storage_path('app/public');

          if($image->move($destination, $fileName))
          {
            return $fileName;
          }
      }

      return null;
    }
}
