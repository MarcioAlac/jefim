<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/landing_page/landing.css')}}">
    <title>Document</title>
</head>
<body>
    <h2>Abaixo escolha a opção que melhor lhe caber</h2>
    <div class="container">
        <div class="content con-left">  
            <span class="bg-left"></span>
            <img class="con-img" src="{{asset('assets/fonemao.png')}}" alt="">

            <div class="con">
                <h1 class="con-title-left">Abrir reclamação</h1>
                <h2>Tenho uma Reclamação</h2>
                <p>Nossos advogados especialisados nas mais diversas areas vão te orientar e lhe liderar em seu Problema</p>
                <a href="{{route('open_call')}}"><button class="con-button-left">Reclame aqui</button></a>
            </div>
           
        </div>

        <div class="content con-right">
            <span class="bg-right"></span>
            <img class="con-img" src="{{asset('assets/image.png')}}" alt="">
            <div class="con">
                <h1 class="con-title-right">Verificar Reclamação</h1>
                <h2>Verificar Reclamação em aberto</h2>
                <p>Caso tenha alguma demanda em aberto clique no botão abaixo.</p>
                <a href="{{route('login')}}"><button class="con-button-right">Verificar reclamação</button></a>
            </div>
        </div>
    </div>
</body>
</html>