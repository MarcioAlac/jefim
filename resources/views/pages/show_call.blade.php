@extends('index')

@section('css')
<link rel="stylesheet" href="{{asset('css/box/box.css')}}">
<link rel="stylesheet" href="{{asset('css/show_call/button.css')}}">
<link rel="stylesheet" href="{{asset('css/box/status.css')}}">
<link rel="stylesheet" href="{{asset('css/show_call/summary.css')}}">
@endsection

@section('content')
    <div class="container">
        <div class="row">

            <h2 class="title">Resumo de processos</h2>

            <div class="col col-lg">
                <div class="summary status-urgent">
                    <h2>Casos Urgentes</h2>
                    <h3>12</h3>
                </div>
            </div>
            <div class="col col-lg">
                <div class="summary status-finished">
                    <h2>Casos Finalizados</h2>
                    <h3>12</h3>
                </div>
            </div>
            <div class="col col-lg">
                <div class="summary status-progress">
                    <h2>Casos em Aberto</h2>
                    <h3>12</h3>
                </div>
            </div>
            <div class="col col-lg">
                <div class="summary status-filed">
                    <h2>Casos Arquivados</h2>
                    <h3>12</h3>
                </div>
            </div>
        </div>
    </div>

<hr class="split-line">

{{-- BOX COMPANY --}}

<h3>Empresas</h3>
@foreach ($query['company'] as $key => $value)
    

    <div class="cards card-0">
        <div class="row">
            <div class="col col-lg">
                <div class="box d-flex">

                   
                    <a href="{{route('caseConfirm',
                    [
                        'case_id' => $value['case_id'],
                        'user_id' => Auth::user()->id,
                        'is_company' => 1
                    ])}}">

                        <div class="buttons">
                            <button>Concluir</button>
                        </div>
                    </a>
                    {{-- STATUS --}}
                    <div class="status status-urgent"></div>

                    <div class="box-contacts">
                        <div class="box-user_name">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                            </svg>
                            @if (isset($query))
                                <span>
                                    {{$value['name']}}
                                </span>
                            @endif
                        </div>
                        <div class="cellphone">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-outbound-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5"/>
                              </svg>
                              @if (isset($query))
                              <span>
                                  {{$value['tel']}}
                              </span>
                          @endif
                        </div>
                        <div class="location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-map-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.5.5 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.5.5 0 0 0-.196 0zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1z"/>
                              </svg>
                              @if (isset($query))
                              <span>
                                  {{$value['adress']}}
                              </span>
                          @endif
                        </div>
                        <div class="email">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 4.697v4.974A4.5 4.5 0 0 0 12.5 8a4.5 4.5 0 0 0-1.965.45l-.338-.207z"/>
                                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686"/>
                              </svg>
                            @if (isset($query))
                              <span>
                                  {{$value['email']}}
                              </span>
                            @endif
                        </div>
                        <div class="date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date-fill" viewBox="0 0 16 16">
                                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zm5.402 9.746c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2"/>
                                <path d="M16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2m-6.664-1.21c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm-2.89-5.435v5.332H5.77V8.079h-.012c-.29.156-.883.52-1.258.777V8.16a13 13 0 0 1 1.313-.805h.632z"/>
                              </svg>
                              @if (isset($query))
                              <span>
                                  {{$value['date']}}
                              </span>
                            @endif
                        </div>
                    </div>

                    <div class="box-subject">
                        @if (isset($query))
                              <h4 class="title">{{$value['topic']}}</h4>
                            @endif
                        
                            @if (isset($query))
                            <h4 class="title">{{$value['textEvent']}}</h4>
                            <p></p>
                          @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
    {{--                                            BOX PERSON                                                                       --}}

    <h3>Pessoa</h3>
@foreach ($query['person'] as $key => $value)
    

    <div class="cards card-0">
        <div class="row">
            <div class="col col-lg">
                <div class="box d-flex">

                    
                    <a href="{{route('caseConfirm',
                    [
                        'case_id' => $value['case_id'],
                        'user_id' => Auth::user()->id,
                        'is_company' => 1
                    ])}}">

                        <div class="buttons">
                            <button>Concluir</button>
                        </div>
                    </a>
                    {{-- STATUS --}}
                    <div class="status status-urgent"></div>

                    <div class="box-contacts">
                        <div class="box-user_name">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                            </svg>
                            @if (isset($query))
                                <span>
                                    {{$value['name']}}
                                </span>
                            @endif
                        </div>
                        <div class="cellphone">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-outbound-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5"/>
                              </svg>
                              @if (isset($query))
                              <span>
                                  {{$value['tel']}}
                              </span>
                          @endif
                        </div>
                        <div class="location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-map-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.5.5 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.5.5 0 0 0-.196 0zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1z"/>
                              </svg>
                              @if (isset($query))
                              <span>
                                  {{$value['adress']}}
                              </span>
                          @endif
                        </div>
                        <div class="email">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 4.697v4.974A4.5 4.5 0 0 0 12.5 8a4.5 4.5 0 0 0-1.965.45l-.338-.207z"/>
                                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686"/>
                              </svg>
                            @if (isset($query))
                              <span>
                                  {{$value['email']}}
                              </span>
                            @endif
                        </div>
                        <div class="date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date-fill" viewBox="0 0 16 16">
                                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zm5.402 9.746c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2"/>
                                <path d="M16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2m-6.664-1.21c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm-2.89-5.435v5.332H5.77V8.079h-.012c-.29.156-.883.52-1.258.777V8.16a13 13 0 0 1 1.313-.805h.632z"/>
                              </svg>
                              @if (isset($query))
                              <span>
                                  {{$value['date']}}
                              </span>
                            @endif
                        </div>
                    </div>

                    <div class="box-subject">
                        @if (isset($query))
                              <h4 class="title">{{$value['topic']}}</h4>
                            @endif
                        
                            @if (isset($query))
                            <h4 class="title">{{$value['textEvent']}}</h4>
                            <p></p>
                          @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection