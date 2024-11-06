<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/layout/topbar.css')}}">
    @yield('css')
</head>
<body>
    <header>
        <div class="header animate__animated animate__slideInDown">
            <div class="header-con">
                <div class="mask">
                    <img class="con-img" src="assets/justice.png" alt="Justica em forma de uma mulher vendanda segurando uma balança"> 
                </div>
                <span>Reclama Cidadão</span>
            </div>
        </div>
    </header>

    @yield('content')

    <br>
    <br>
    <br>
    @yield('script')
</body>
</html>

