@extends('templates.template')

@section('content')
    <h1 class="text-center"> Teste </h1>

    <div class="text-center mt-3 mb-4">
        <a href="">
            
            <a href="{{url('produtos/create')}}">
            <button class="btn btn-success">Cadastrar</button>
    </a>
        </a>
    </div>


    <div class="col-8 m-auto">
    <table class="table text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Título</th>
      <th scope="col">Autor</th>
      <th scope="col">Preço</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  @foreach($produto as $produtos)
    @php
        $user=$produtos->find($produtos->id)->relUsers;
    @endphp
     <tr>
        <th scope="row">{{$produtos->id}}</th>
        <td>{{$produtos->title}}</td>
        <td>{{$user->name}}</td>
        <td>{{$produtos->price}}</td>
        <td>
            <a href="{{url("produtos/$produtos->id")}}">
                <button class="btn btn-dark">Visualizar</button>
            </a>                        

            <a href="">
                <button class="btn btn-primary">Editar</button>
            </a>

            <a href="">
                <button class="btn btn-danger">Deletar</button>
            </a>
        </td>
     </tr>
  @endforeach
    
  </tbody>
</table>


    </div>

    
@endsection