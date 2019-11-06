<!DOCTYPE html>
<html lang="en">

<head>

  @include ('Backend.includes.header')

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @include ('Backend.includes.navbar')
    

    @yield('adminpagecontent')


    @include ('Backend.includes.footer')

</body>

</html>
