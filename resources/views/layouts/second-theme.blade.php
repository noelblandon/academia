<!doctype html>
<html lang="es">

<head>
  <title> @yield('title') | Academia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{ asset('dist/styles.css') }} ">

  <style>
  .login{
    background: url('./dist/images/login-new.jpeg')
  }
  </style>  
  @stack('css')
  @livewireStyles
</head>
<body class="h-screen font-sans login bg-cover">
@yield('alerts')
@yield('content')
@livewireScripts
</body>

</html>
