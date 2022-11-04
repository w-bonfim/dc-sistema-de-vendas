@extends('layouts.admin')

@section('title', 'Lista de produtos')
@section('content')

    <h1>Lista de produtos</h1>

    {{-- <div class="jumbotron jumbotron-fluid"> --}}
    <div class="container">
        <a href="/products/create" class="btn btn-success" style="float: right">Novo</a>
    </div>
    {{-- </div> --}}
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Thumb</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Ativo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product) 
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>
                        <figure class="figure">
                            <img src="{{ $product->image }}" class="figure-img img-fluid rounded" style="width: 60px">
                        </figure>
                    </td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->is_active ? 'SIM' : 'NÃO' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection