<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>product management</title>

    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('assets/images/favicon.png') }}"
    />

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

  </head>
  <body>

    <div id="main-wrapper">
      @yield('content')

      
    </div>
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>

    <script src="{{ asset('assets/js/custom.min.js') }}"></script>

  </body>
</html>