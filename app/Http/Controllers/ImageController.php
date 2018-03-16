<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    public function index()
    {
      // mengambil data yang terakhir di input
      // $images = Image::orderBy('create_at','desc')->get(); atau menggunakan ->
      $images = Image::latest()->get();
      return view('welcome', compact('images'));
    }

    public function store( Request $request)
    {
      $request->validate([
          'file_name.*' => 'image|mimes:jpg,jpeg,png,gif,bmp',
          
      ]);

      $images = $this->uploadFiles($request);

      foreach ($images as $imageFile) {

        // membuat judul image
        list($fileName, $title) = $imageFile;

        //  mendeklarasikan Model Image
      $image = new Image();
       // menampung dari request form
       
       $image->title      = $title;
       $image->file_name  = $fileName; // mengambil dari method dan berisi object $request
       $image->save(); //menyimpan ke database

      }

       return redirect('/')->with('message', 'Your Image Successfully Uploaded!');
    }

    protected function uploadFiles($request)
    {
      $uploadedImages = [];
      if ($request->hasFile('file_name'))
      {
          $images = $request->file('file_name');

          foreach ($images as $image) {
            $uploadedImages[] = $this->uploadFile($image);
          }
      }

      return $uploadedImages;
    }

    protected function uploadFile($image)
    {
          $originalFileName = $image->getClientOriginalName(); //mengambil nama file yg di upload
          $extension = $image->getClientOriginalExtension();
          $fileNameOnly = pathinfo($originalFileName, PATHINFO_FILENAME);
          $fileName = str_slug($fileNameOnly) . "-" . time() . "." .$extension;
 
           
        $uploadedFileName = $image->storeAS('public', $fileName);
    
        return [$uploadedFileName, $fileNameOnly];
    }
}
