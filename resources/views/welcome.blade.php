@extends('layouts.front')

@section('title', 'DC Sistema de Vendas')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um produto</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Produtos </h2>
    <p class="subtitle"></p>
    @endif
    <div id="cards-container" class="row">
        @foreach($products as $product)
        <div class="card col-md-3">
            <img src="{{ $product->image }}" alt="{{ $product->title }}">
            <div class="card-body">
                <p class="card-date">Última atualização {{ date('d/m/Y H:i:s', strtotime($product->created_at)) }}</p>
                <h5 class="card-title">{{ $product->title }}</h5>
                {{-- <p class="card-participants"> {{ count($products->users) }} Participantes</p> --}}
                <p>{{ $product->price }}</p>
                <a href="/finalizar-pedido/{{ $product->id }}" class="btn btn-primary text-center">Comprar</a>
            </div>
        </div>
        @endforeach

        @if(count($products) == 0 && $search)
            <p>Não foi possível encontrar nenhum produto com {{ $search }}! <a href="/">Ver todos</a></p>
        @elseif(count($products) == 0)
            <p>Este produto não está mais disponível</p>
        @endif
    </div>
</div>

@endsection