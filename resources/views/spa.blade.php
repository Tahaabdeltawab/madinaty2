@php
app()->setLocale('ar');
$config = [
    'appName' => config('app.name'),
    'locale' => ($locale = app()->getLocale()),
    'locales' => config('app.locales'),
    'facebookAuth' => config('services.facebook.client_id'),
    'googleAuth' => config('services.google.client_id'),
    'asset' => asset('')
];
$appJs = asset('dist/js/app.871760.js');
$appCss = asset('dist/css/app.2cdd09.css');
// $appJs = mix('dist/js/app.js');
// $appCss = mix('dist/css/app.css');
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ config('app.name') }}</title>

  <link rel="stylesheet" href="{{ (str_starts_with($appCss, '//') ? 'http:' : '') . $appCss }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> 

</head>

<body dir="rtl">
  <div id="app"></div>

  <script>
    window.config = @json($config);

  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    new WOW().init();
  </script>
  
  <script src="{{ (str_starts_with($appJs, '//') ? 'http:' : '') . $appJs }}"></script>

</body>

</html>
