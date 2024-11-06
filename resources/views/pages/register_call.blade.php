@extends('layout.header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register_call/forme.css') }}">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
@endsection

@section('content')
   <h2 class="animate__animated animate__zoomIn" style="text-align: center; margin-top: 2.5%; padding: 2px"><mark>Contra quem será movida a ação?</mark></h2>

@if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $errors }}</li>
           @endforeach
       </ul>
   </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
        <p> <a href="{{route('login')}}">Aqui</a> para ir para a pagina de login ! </p>
    </div>
@endif 


    <div class="container container-a animate__animated animate__slideInLeft">
        <div class="con-button">
            <h3>Pessoa</h3>
            <button class="btn btn-danger btn-a">Clique aqui para abrir</button>
        </div>
        <form action="{{route('register')}}" method="POST" class="form">
            @csrf
            <div class="box">

                <div class="row">
                    <div class="col col-sm">
    
                        <div class="input-box">
                            <h5>Tema da Ação*</h5>
                            <input class="input-name" type="text" name="topic" id=""
                                placeholder="Ex: Não compriram com o acordo"
                                value="{{old('topic')}}">
                              </div>
                        <div class="input-box">
                            <h5>Nome do Acusado*</h5>
                            <input class="input-name" type="text" name="Defendant" id=""
                                placeholder="Jose Alberto Astro"
                                value="{{old('Defendant')}}">
                        </div>
    
                    </div>
    
                    <div class="col col-sm">
                        <div class="input-box">
                            <h5>RG</h5>
                            <input class="input-name" type="text" name="rg" placeholder=""
                            value="{{old('rg')}}">
                        </div>
                        <div class="input-box">
                            <h5>CPF*</h5>
                            <input class="input-name" type="text" name="cpf" placeholder=""
                            value="{{old('cpf')}}">
                        </div>
                      
                    </div>
    
                    <div class="col col-sm">
                        <div class="input-box">
                            <h5>Endereço</h5>
                            <input class="input-name" type="text" name="adress" id=""
                            value="{{old('adress')}}">
                        </div>

                        <div class="input-box">
                            <h5>Data do Ocorrido</h5>
                            <input class="input-name" type="date" name="date" id=""
                            value="{{old('date')}}">
                        </div>
                    </div>
                </div>
            </div>
    
            <h3>Dados</h3>
    
            <div class="box ">
    
                <div class="row">
    
                    <div class="col col-sm">
                        <div class="input-box">
                            <h5>Evidencias</h5>
                            <input type="file" name="file">
                        </div>
                        <div class="input-box">
                            <h5>Seu nome*</h5>
                            <input class="input-name" type="text" name="name" id=""
                            value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="col col-sm">
    
    
                        <div class="input-box">
                            <h5>Contato*</h5>
                            <input class="input-name" type="tel" name="tel" placeholder="(00) 00000-0000"
                            value="{{old('tel')}}">
                        </div>
    
                        <div class="input-box">
                            <h5>Email</h5>
                            <input class="input-name" type="email" name="email" placeholder="exemplo@dominio.com"
                            value="{{old('email')}}">
                        </div>
                    </div>
    
                
                    <div class="row">
                        <div class="col col-sm ">
                            <div class="input-box">
                                <h5>Descreva o Ocorrido*</h5>
                                <textarea name="textEvent" id="" cols="50" rows="6">{{old('textEvent')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <input class="btn btn-primary submit" type="submit" value="Solicitar">
        </form>
      
    </div>

    <form action="{{route('register')}}" method="POST" class="form">
        @csrf
    <div class="container container-b animate__animated animate__slideInRight">
            <div class="con-button">
                <h3>Empresa</h3>

                <input class="btn btn-danger btn-b" type="button" value="Clique aqui para abrir">
            </div>
   
            <div class="box">

                <div class="row">
                    <div class="col col-sm">

                        <div class="input-box">
                            <h5>Tema da Ação*</h5>
                            <input class="input-name" type="text" name="topic" id=""
                                placeholder="Ex: Não compriram com o acordo"
                                value="{{old('topic')}}">
                        </div>
                        <div class="input-box">
                            <h5>Empresa*</h5>
                            <input class="input-name" type="text" name="company" id="" placeholder="Nome Fantasia"
                            value="{{old('company')}}">
                        </div>

                    </div>

                    <div class="col col-sm">
                        <div class="input-box">
                            <h5>CNPJ*</h5>
                            <input class="input-name" type="text" name="cnpj" placeholder=""
                            value="{{old('cnpj')}}">
                        </div>
                        <div class="input-box">
                            <h5>Data do Ocorrido</h5>
                            <input class="input-name" type="date" name="date" id=""
                            value="{{old('date')}}">
                        </div>
                    </div>

                    <div class="col col-sm">
                        <div class="input-box">
                            <h5>Endereço da Sede</h5>
                            <input class="input-name" type="text" name="adressCompany" id=""
                            value="{{old('adressCompany')}}">
                        </div>
                    </div>
                </div>
            </div>

            <h3>Dados</h3>

            <div class="box ">

                <div class="row">
                    <div class="col col-sm ">
                        <div class="input-box">
                            <h5>Email</h5>
                            <input class="input-name" type="email" name="email" placeholder="exemplo@dominio.com"
                            value="{{old('email')}}">
                        </div>
                        <div class="input-box">
                            <h5>Evidencias</h5>
                            <input type="file" name="file" name='file'>
                        </div>
                    </div>

                    <div class="col col-sm">
                        <div class="input-box">
                            <h5>Seu nome*</h5>
                            <input class="input-name" type="text" name="name" id=""
                            value="{{old('name')}}">
                        </div>

                        <div class="input-box">
                            <h5>Contato*</h5>
                            <input class="input-name" type="tel" name="tel" placeholder="(00) 00000-0000"
                            value="{{old('tel')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-sm">
                            <div class="input-box">
                                <h5>Descreva o Ocorrido</h5>
                                <textarea name="textEvent" cols="50" rows="6">{{old("textEvent")}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary submit" type="submit" value="Solicitar">
    </div>
    </form>
@endsection


@section('script')
    <script src="{{ asset('script/register_call/form.js') }}"></script>
    @if(session('error'))
        <script> 
            alert('error');
        </script>
    @endif
@endsection
