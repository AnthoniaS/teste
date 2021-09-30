@extends('templates.template')

@section('content')
    <h1 class="text-center"> Visualizar </h1>

  
    <div class="col-8 m-auto">
    @php
            $user=$produto->find($produto->id)->relUsers;
        @endphp
        Título: {{$produto->title}}<br>
        Páginas: {{$produto->pages}}<br>
        Preço: R$ {{$produto->price}}<br>
        Autor: {{$user->name}} <br>
        Email do autor: {{$user->email}} <br>
 </div>
    
@endsection