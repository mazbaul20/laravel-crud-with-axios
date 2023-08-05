<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap@5.0.2_dist_css_bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/icon?family=Material+Icons') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet" />
    <!-- DataTable -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">
    <script src="{{ asset('js/code.jquery.com_jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    
    <script src="{{asset('js/toastify-js.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
  </head>
  <body>

    <div id="loader" class="LoadingOverlay d-none">
      <div class="Line-Progress">
          <div class="indeterminate"></div>
      </div>
    </div>

    @yield('content')
    
    <!-- bootstrap js -->
    <script src="{{ asset('js/bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js') }}"></script>
  </body>
</html>