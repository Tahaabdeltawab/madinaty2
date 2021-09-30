@php
$config = [
    'appName' => config('app.name'),
    'locale' => ($locale = app()->getLocale()),
    'locales' => config('app.locales'),
    'facebookAuth' => config('services.facebook.client_id'),
    'googleAuth' => config('services.google.client_id'),
    'asset' => asset('')
];
$appJs = asset('dist/js/app.a27183.js');
$appCss = asset('dist/css/app.2b4f0f.css');
// $appJs = mix('dist/js/app.js');
// $appCss = mix('dist/css/app.css');
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ config('app.name') }}</title>

  <link rel="stylesheet" href="{{ (str_starts_with($appCss, '//') ? 'http:' : '') . $appCss }}">
</head>

<body dir="rtl">
  <div id="app"></div>

  <script>
    window.config = @json($config);

  </script>


  <script src="{{ (str_starts_with($appJs, '//') ? 'http:' : '') . $appJs }}"></script>
</body>

</html>
