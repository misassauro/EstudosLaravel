@extends('site.layout')
@section('title', 'Home')


@section('conteudo')
    <h1>Esse é nossa home</h1>

    @include('includes.mensagem', ['titulo' => 'Mensagem de sucesso!'])

    @component('components.sidebar')
        @slot('paragrafo')
            Texto qualquer vindo do slot
        @endslot
    @endcomponent

    {{-- Basicamente um IF ELSE em apenas uma linha. O que queremos dizer abaixo é o seguinte: A variável $nome está definida, ela existe(?) Se sim, printamos que existe. Senão (:), printamos que não existe. --}}
    {{-- {{isset ($nome) ? 'existe' : "não existe"}}  --}}
    

    {{-- Abaixo, estamos definindo um valor padrão para uma variável caso ela não exista. --}}
    {{-- {{$teste ?? 'valor padrão'}} --}}

    {{-- Estrutura de controle --}}

    {{-- @if ($nome == 'Misael')
        true
    @else
        false
    @endif --}}

    {{-- A comparação abaixo é falsa? Se for, imprime true. Senão, imprime false. --}}
    {{-- @unless ($nome == 'Misinha') 
        true
    @else
        false
    @endunless

    @switch($idade)
        @case(20)
            idade tá certinha
            @break
        @case(23)
            idade ta erradinha
            @break
        @default
            valor padrao
    @endswitch

    @isset($nome)
        existe
    @endisset

    @empty($nome)
        esta vazia
    @endempty

    @auth
        está autenticado
    @endauth

    @guest
        não está autenticado   
    @endguest

    <br>

    @for ($i = 0; $i <= 10; $i++)
        FOR - O valor atual é {{$i}} <br>
    @endfor

    @php
        $i = 0;
    @endphp

    @while ($i <= 10)
        WHILE - O valor atual é {{$i}} <br> 
        @php
            $i++
        @endphp
    @endwhile

    @foreach ($frutas as $fruta)
        {{$fruta}} <br>
    @endforeach

    @forelse ($frutas as $fruta)
        {{$fruta}} <br>
    @empty
        O array de frutas está vazio.
    @endforelse --}}

    

    

    
@endsection
@push('style')
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>@yield('title')</title>
@endpush
@push('script')
    <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>    
@endpush