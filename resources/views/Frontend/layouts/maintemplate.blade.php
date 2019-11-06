<!DOCTYPE html>
<html lang="en">
    <head>
      <!-- Header Codes -->
      @include('Frontend.includes.header')
    </head>

    <body>
      <div class="preloader loader" style="display: block; background:#f2f2f2;"> <img src="image/loader.gif"  alt="#"/></div>

      <!-- navbar -->
      @include('Frontend.includes.navbar')

        <!-- All Page Body Content -->
        @yield('bodycontent')
    
      <!-- Footer -->
      @include('Frontend.includes.footer')
    </body>
</html>
