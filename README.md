# Ajax-Multiple-File-Upload
Ajax Multiple File Upload dengan Laravel 5.5 + Vue.js 2

## Controller
* Fungsi store untuk melakukan pengelolaan penyimpanan data
```
public function store()
{
  // menampilkan pesan di halaman web
  dd('Ready to Upload');
}
```

## Validasi
* Melakukan validasi pada saat upload image
```
public function store( Request $request)
{
  $request->validate([
      'file_name' => 'image|mimes:jpg,jpeg,png,gif,bmp',
      'title'     => 'required'
  ]);
}
```
* Mendefinisikan rules (aturan)
```
$request->validate([]);
```
* Mendefinisikan output form validate
code ini diletakkan diluar lingkup tag **form**
```
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
```

## Upload file
```
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
```

* method upload
```
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
```

* menampilkan alert message 
```
@elseif (session('message'))
  <div class="alert alert-info">
    {{ session('message') }}
  </div>
@endif
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
