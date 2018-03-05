# Ajax-Multiple-File-Upload
Ajax Multiple File Upload dengan Laravel 5.5 + Vue.js 2

# Validasi
```
public function store( Request $request)
{
  $request->validate([
      'file_name' => 'image|mimes:jpg,jpeg,png',
      'title'     => 'required'
  ]);
}

```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
