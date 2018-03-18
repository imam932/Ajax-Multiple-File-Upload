<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">  <!-- menghindari csrf-token error -->

  <title>Laravel</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style media="screen">
    nav.navbar{
      margin-bottom: 0;
    }

    #image-form-wrapper {
      margin-top: 20px;
      background: #f7f7f7;
    }

    #images {
      background: #eee;
      padding: 20px 0;
    }
  </style>

</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">
          My Images
        </a>
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="#">Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="image-form-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Upload Your Images</h3>
            </div>
            <div class="panel-body">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @elseif (session('message'))
                <div class="alert alert-info">
                  {{ session('message') }}
                </div>
              @endif
              
              <!--<form-upload></form-upload>-->

              <form action="/" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                <div class="form-group">
                  <!--<file-input v-on:file-change="setFiles"></file-input>-->
                  <label>Image</label>
                  <!--<file-input></file-input>-->
                  <input type="file" name="file_name[]" multiple>
                </div>
                <div class="form-group">
            <button type="submit" class="btn btn-success">Upload</button>
        </div>
    </form>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <section id="images">
    <div class="container">
      <div class="row">
      @if($images->count() < 1)
        <div class="alert alert-danger">
          You have no images
        </div>
      @endif
      
      @foreach($images as $image)
        <div class="col-md-4">
          <div class="thumbnail">
            <!--<img src="{{ asset('storage/' . $image->file_name) }}" alt="">  cara 1-->
            <img src="{{ $image->src }}" alt="">
            <div class="caption">
              <h3>{{$image->title}}</h3>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
  </section>

  <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
  
</body>
</html>
