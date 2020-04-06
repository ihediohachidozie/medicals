@include('layouts.inc.header')
<body>
    <div id="app">

            @include('layouts.inc.nav')
            
       

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
