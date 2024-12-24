<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Origayen Agro Pvt. Ltd.</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <link rel="shortcut icon" type="image/png" href="{{asset('frontend-asset/images/favicon.png')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
  @include('frontend.layout.partials.headScript')

    
</head>

<body>

  @include('frontend.layout.partials.header')

    @yield('content')

    @include('frontend.layout.partials.footer')
    @include('frontend.layout.partials.footerScript')
  
    

</body>

</html>