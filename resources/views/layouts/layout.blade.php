<!DOCTYPE html>
<html lang="en">
<head>
    <!-- style -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="fb:pages" content="156796752044" />

    <meta property="og:url" content=@yield('og-url', 'www.jeban.com') />
    <meta property="og:title" content=@yield('og-title', 'Jeban.com') />
    <meta property="og:description" content=@yield('og-description', 'รวมเทคนิคการแต่งหน้า, กรุเครื่องสำอาง, MakeUp is Magic') />
    <meta property="og:image" content=@yield('og-image', '') />

    <title>@yield('title', 'Jeban.com - รวมเทคนิคการแต่งหน้า, กรุเครื่องสำอาง, MakeUp is Magic')</title>

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link href="/fonts/icon/css/jeban-iconset.css" rel="stylesheet">

    @yield('style')
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <script src="{{ mix('/js/app.js') }}" type="text/javascript"></script>
    @yield('script')
</body>
</html>
