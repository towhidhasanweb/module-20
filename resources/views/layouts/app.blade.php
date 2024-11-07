<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>product management</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('assets/images/favicon.png') }}"
    />
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist.min.css') }}" /> --}}
    {{-- <link
      href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}"
      rel="stylesheet"
    /> --}}
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    {{-- <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet"
    /> --}}
  </head>
  <body>

    <div id="main-wrapper">
      @yield('content')

      
    </div>
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/deznav-init.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}"></script> --}}
  </body>
</html>