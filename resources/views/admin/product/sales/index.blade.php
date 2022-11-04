@extends('layouts.admin')

@section('title', 'Vendas')
@section('content')

    <h1>Vendas</h1>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Vendedor Responsável</th>
                <th scope="col">Produto</th>
                <th scope="col">Forma de pagamento</th>
                <th scope="col">Valor</th>
                <th scope="col">Quantidade Parcelas</th>
                <th scope="col">Data da Venda</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale) 
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->seller }}</td>
                    <td>{{ $sale->product }}</td>
                    <td>{{ $sale->pay }}</td>
                    <td>{{ $sale->price }}</td>
                    <td>{{ $sale->amount_portion }}</td>
                    <td>{{ date('d/m/Y H:i:s', strtotime($sale->created_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection