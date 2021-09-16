@php
$config = [
    'appName' => config('app.name'),
    'locale' => ($locale = app()->getLocale()),
    'locales' => config('app.locales'),
    'githubAuth' => config('services.github.client_id'),
    // 'asset' => asset('')
];
$appJs = mix('dist/js/app.js');
$appCss = mix('dist/css/app.css');
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ config('app.name') }}</title>

  <link rel="stylesheet" href="{{ (str_starts_with($appCss, '//') ? 'http:' : '') . $appCss }}">
</head>

<body>
  <div id="app"></div>

  <script>
    window.config = @json($config);

  </script>

  {{-- <script src="{{ asset('q/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('q/assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('q/assets/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('q/assets/js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('q/assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('q/assets/js/sticksy.js') }}"></script>
  <script src="{{ asset('q/assets/js/quickmunch.js') }}"></script> --}}
  
  {{-- <script src="{{ asset('q/assets/js/map.js') }}"></script> --}}
  {{-- <script src="{{ asset('q/assets/js/ion.rangeSlider.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('q/assets/js/swiper.min.js') }}"></script> --}}

  <script src="{{ (str_starts_with($appJs, '//') ? 'http:' : '') . $appJs }}"></script>
</body>

</html>
