# Ajax-Multiple-File-Upload
Ajax Multiple File Upload dengan Laravel 5.5 + Vue.js 2

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

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
