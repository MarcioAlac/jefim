@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('index')

<title>Usuario</title>

@section('css')
    <link rel="stylesheet" href="{{ asset('css/user/user.css') }}">
    <link rel="stylesheet" href="{{asset('css/box/box.css')}}">
    <link rel="stylesheet" href="{{asset('css/box/box-finished.css')}}">
    <link rel="stylesheet" href="{{asset('css/box/status.css')}}">
@endsection

@section('script')
    <script src="{{asset('js/user/scrollview.js')}}"></script>
@endsection

@section('content')
    <div class="container">
        <h2 class="text-center"><mark class="p-2">Olá Nome.User abaixo estam as</mark><br><mark class="p-2">informaçoes sobre sua conta</mark></h2>
        <div class="user">
            <div class="row">
                <div class="col col-sm">

                    <div class="box-con">
                        <div class="img-box" id="img-box">
                            <img src="{{ asset('assets/perfil-img.png') }}" alt="foto-usuario" id="user-img">
                            <div class="img-status">
                                @if (isset( Auth::user()->name ) )
                                    <h5>{{ Auth::user()->name }}</h5>
                                @endif
                                <h6>
                                    @if( Auth::user()->level == 1 )
                                        <p>Administrador</p>
                                        @else
                                            <p>Advogado</p>
                                    @endif                                 
                                </h6>
                                <h6>{{ Auth::user()->created_at }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col col-sm">
                    <div class="img-box">
                        <h4>Casos novos</h4>
                                                                                                                                                                    {{-- PROGRAMAR FRONT END TENDO TDAH É HORRIVEL MEU DEUS 5x NESSA LINHA KKKKKKKK --}}
                        <div class="box-status new-box">
                            <h4>
                                <mark>
                                    <button onclick="scrollToTarget()">
                                        @if ( isset($newCases))
                                           {{$newCases}}
                                        @endif
                                      
                                    </button>
                                </mark>
                            </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-sm">
                            <div class="img-box">
                                <h4>Casos Finalizados</h4>
        
                                <div class="box-status finish-box">
                                    <h4>
                                        <mark>
                                            <a href="{{route('finished_call')}}">
                                                @if (isset($finishedCases))
                                                    {{$finishedCases}}            
                                                @endif
                                            </a>
                                        </mark>
                                    </h4>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>

                
                
                <div class="col col-sm">
                    <div class="box-con">
                        <div class="right-cont">

                            <h4>Detalhes da conta</h4>

                                <div class="col col-sm">

                                    <div class="oab-box">
                                        <span class="title">
                                            @if (!is_null(Auth::user()->oab_number))
                                                <p>Número da OAB: <br>{{Auth::user()->oab_number}}</p>
                                            @endif
                                        </span>
                                    </div>
                                </div>

                            <div class="row">
                                <div class="col col-sm">

                                    <div class="acepted">
                                        <p class="title">Casos em Aberto</p>
                                        <div class="box-status acepted-box">
                                            <h4>
                                                <mark>
                                                    <a href="{{route('open')}}">
                                                        @if (isset($openCases))
                                                             {{$openCases}}              
                                                         @endif
                                                    </a>
                                                </mark>
                                            </h4>
                                        </div>
                                    </div>

                                </div>

                                <div class="col col-sm">
                                    <div class="decline">
                                        <p class="title">Casos Arquivados</p>
                                        <div class="box-status t-center decline-box">
                                            <h4>
                                                <mark>
                                                    @if (isset($arquiveCases))
                                                       {{ $arquiveCases }}
                                                    @endif
                                                </mark>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">

            <h3 class="text-center my-5"><mark class="p-2">Casos Novos</mark></h3>
            <p class="text-center"><mark> estam todos os casos disponiveis ate o momento, ao escolher o seu caso, defina a sua prioridade e clique em aceitar </mark> </p>
            
            <div class="col col-sm">
                {{-- Box Cases  --}}
                <h4>Empresas</h4>
                @if (isset($cases['newCasesCompany']) and count($cases['newCasesCompany']) > 0)
                    @foreach ( $cases['newCasesCompany'] as $key => $value )
                        <div class="box d-flex" id="new_call">
                            {{-- STATUS --}}
                            {{-- <div class="status status-progress"></div> --}}
                    
                            <div class="box-contacts">
                                <div class="box-user_name">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                                    </svg>
                                    <span>
                                      {{ $value['name'] }}
                                    </span>
                                </div>
                                <div class="cellphone">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-outbound-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5"/>
                                    </svg>
                                    <span>
                                        {{ $value['tel'] }}
                                    </span>
                                </div>
                                <div class="location">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-map-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.5.5 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.5.5 0 0 0-.196 0zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1z"/>
                                    </svg>
                                    <span>
                                        {{ $value['adress'] }}
                                    </span>
                                </div>
                                <div class="email">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 4.697v4.974A4.5 4.5 0 0 0 12.5 8a4.5 4.5 0 0 0-1.965.45l-.338-.207z"/>
                                        <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686"/>
                                    </svg>
                                    <span>
                                        {{ $value['email'] }}
                                    </span>
                                </div>
                                <div class="date">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date-fill" viewBox="0 0 16 16">
                                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zm5.402 9.746c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2"/>
                                        <path d="M16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2m-6.664-1.21c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm-2.89-5.435v5.332H5.77V8.079h-.012c-.29.156-.883.52-1.258.777V8.16a13 13 0 0 1 1.313-.805h.632z"/>
                                    </svg>
                                    <span>
                                        {{ $value['created_at'] }}
                                    </span>
                                </div>
                                <div class="date-check">                            
                                    {{-- <div class="datein">
                                        <h4>Data de Solicitação</h4>
                                        <p>
                                            @if (isset($created_at))
                                                {{$created_at}}
                                            @endif
                                        </p>
                                    </div> --}}
                                    <a href="{{route('caseUpdate',
                                    [
                                        'case_id' => $value['case_id'],
                                        'user_id' => Auth::user()->id,
                                        'is_company' => 1
                                    ])}}">

                                    <input type="button" value="Aceitar" class="btn btn-danger">
                                    </a>
                                    </div>
                                </div>
                                
                                <div class="box-details">
                                    <h4 class="title"> {{ $value['topic'] }}</h4>
                                    <div class="box-subject">
                                    <p>
                                        {{ $value['textEvent'] }}
                                    </p>
                                </div>
                            </div>
                            
                        </div>
                    @endforeach
                @endif


















                <h4>Pessoas</h4>
                @if (isset($cases['newCasesPerson']) and count($cases['newCasesPerson']) > 0)
                    @foreach ( $cases['newCasesPerson'] as $Key => $Value )
                    <div class="box d-flex" id="new_call">
                        {{-- STATUS --}}
                        {{-- <div class="status status-progress"></div> --}}
                
                        <div class="box-contacts">
                            <div class="box-user_name">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                                </svg>
                                <span>
                                  {{ $Value['name'] }}
                                </span>
                            </div>
                            <div class="cellphone">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-outbound-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5"/>
                                </svg>
                                <span>
                                    {{ $Value['tel'] }}
                                </span>
                            </div>
                            <div class="location">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-map-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.5.5 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.5.5 0 0 0-.196 0zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1z"/>
                                </svg>
                                <span>
                                    {{ $Value['adress'] }}
                                </span>
                            </div>
                            <div class="email">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 4.697v4.974A4.5 4.5 0 0 0 12.5 8a4.5 4.5 0 0 0-1.965.45l-.338-.207z"/>
                                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686"/>
                                </svg>
                                <span>
                                    {{ $Value['email'] }}
                                </span>
                            </div>
                            <div class="date">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date-fill" viewBox="0 0 16 16">
                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zm5.402 9.746c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2"/>
                                    <path d="M16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2m-6.664-1.21c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm-2.89-5.435v5.332H5.77V8.079h-.012c-.29.156-.883.52-1.258.777V8.16a13 13 0 0 1 1.313-.805h.632z"/>
                                </svg>
                                <span>
                                    {{ $Value['created_at'] }}
                                </span>
                            </div>
                            <div class="date-check">                            
                                {{-- <div class="datein">
                                    <h4>Data de Solicitação</h4>
                                    <p>
                                        @if (isset($created_at))
                                            {{$created_at}}
                                        @endif
                                    </p>
                                </div> --}}

                                <a href="{{route('caseUpdate',
                                [
                                    'case_id' => $Value['case_id'],
                                    'user_id' => Auth::user()->id,
                                    'is_company' => 0
                                ])}}">

                                <input type="button" value="Aceitar" class="btn btn-danger">
                                </a>
                                </div>
                            </div>
                            
                            <div class="box-details">
                                <h4 class="title"> {{ $Value['topic'] }}</h4>
                                <div class="box-subject">
                                <p>
                                    {{ $Value['textEvent'] }}
                                </p>
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                @endif
                {{--\ Box Cases  --}}
               
            </div>
        </div>
    </div>
@endsection
