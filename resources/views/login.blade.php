<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area de login</title>
    <!-- Css link  -->
     <link rel="stylesheet" href="{{ asset('css/login/index.css')}}">
    <!-- font awesome icons -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>


    <div class="container" id="container">
        <!-- Resgistro da conta -->
        <div class="form-container sign-up-container">
            <form action="{{route('userCreate')}}" method="post">
                @csrf
                @if(session('error'))
                    <div class="alert-user  alert-success">
                        {{ session('error') }}
                    </div>
                @endif
                @if(session('success'))
                <div class="alert-user  alert-success">
                    {{ session('success') }}
                </div>
                @endif
        
                @if ($errors->any())
                    <div class="alert-user alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h1>Criar conta</h1>
                
                <div class="infield">
                    <input type="text" name="name" placeholder="Nome">
                    <label for=""></label>
                </div>

                <div class="infield">
                    <input type="email" placeholder="Email" name="email">
                    <label for=""></label>
                </div>

                <div class="infield">
                    <input type="password" name="password" placeholder="Senha">
                    <label for=""></label>
                </div>

                <input type="submit" value="Criar">
            </form>
        </div>

        <!-- Entrar na conta -->
        <div class="form-container sign-in-container">
            <form action="{{route('userCheck')}}" method="post">
                @csrf
            @if(session('error'))
                <div class="alert-user  alert-success">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert-user  alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
        
            @if ($errors->any())
           <div class="alert-user alert-danger">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
            @endif

            @if(session('error_e'))
            <div class="alert-user  alert-success">
                {{ session('error_e') }}
            </div>
            @endif

                <h1>Entrar na conta</h1>
                <div class="infield">
                    <input type="email" placeholder="Email" name="email">
                    <label for=""></label>
                </div>

                <div class="infield">
                    <input type="password" name="password" placeholder="Senha">
                    <label for=""></label>
                </div>

                <a href="#" class="forgot">Esqueceu sua senha ?</a>
                <input type="submit" value="Logar">
            </form>
        </div>

        <!-- Sobreposição de login -->
        <div class="overlay-container" id="overlayCon">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Ja possue conta ?</h1>
                    <p>Clique no botão abaixo.</p>
                    <button>Entrar</button>
                </div>
                <div id="g_id_onload"
     data-client_id="YOUR_GOOGLE_CLIENT_ID"
     data-context="signin"
     data-ux_mode="popup"
     data-login_uri="YOUR_REDIRECT_URI"
     data-auto_prompt="false">
</div>
                <div class="overlay-panel overlay-right">
                    <h1>Ola, crie sua conta !</h1>
                    <p>Crie sua conta em poucos segundos !</p>
                    <button>Criar conta</button>
                </div>
            </div>

            <button id="overlayBtn"></button>
        </div>
    </div>


    <!-- js code -->
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script rel="script" src="{{ asset('script/login-animation.js') }}"></script>
</body>
</html>