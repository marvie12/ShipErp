<!DOCTYPE html>
<html lang="en-ph">

<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <meta name="google-site-verification" content="DNyG9hy5kRAYiExxO90uaAepFCQQ_MyNa9CcXYKb2Rg" />
    <meta name="viewport" content="width=device-width">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">
    <meta name="robots" content="noindex,nofollow">
    @include(view_path('includes.favicon'))

    <style>
       <?php echo file_get_contents(url('/css/critical/mobile-500.css')); ?>
    </style>

     <!-- OVERRIDE CSS -->
    @include(view_path('includes.override_css'))

    <!--SVG-->
    @include(view_path('includes.svg'))

    <!-- scripts used for both desktop and mobile -->
    @include(view_path('partials.universal_js.top'))

    <!-- HEAD CLOSE -->
    @include(view_path('includes.head_close'))
</head>

<body>
   <!-- BODY OPEN -->
   @include(view_path('includes.body_open'))

   <div>
        <div class="wrapper wrapper--nopadding" id="wrapper">
            <main>
                @yield('main')
            </main>
        </div>
        
        <header>
            @include(view_path('page.header'))
        </header>

        <footer>
            <div class="footer footer--fixed footer--fixed--light">© 2017 Cosmopolitan Philippines</div>
        </footer>
    </div>

    @include(view_path('partials.universal_js.bottom'))

   <!-- BODY CLOSE -->
    @include(view_path('includes.body_close'))
</body>

</html>
