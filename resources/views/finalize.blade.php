@extends('layouts.front')

@section('title', 'Finalizar pedido')

@section('content')

<div class="container-fluid">
    <form id="form" action="/finalizar-pedido/salvar" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4 offset-md-2">
                <h2>Detalhe da Compra: #{{ $product->id }}</h2>
                <p><strong>Produto: </strong>{{ $product->title }}</p>
                <p><strong>Descrição: </strong>{{ $product->description }}</p>
                <p><strong>Preço: </strong>{{ $product->price }}</p>    
                <input type="hidden" name="product" class="form-control" value="{{ $product->title }}">      
            </div>
            
            <div class="col-md-6">
                <h2>Forma de pagamento</h2>
                <div class="row">
                    <div class="form-group mx-sm-3 mb-2">
                        <select name="pay" id="pay" class="form-control" required>
                            <option value="">Selecione...</option>
                            <option value="PIX">PIX</option>
                            <option value="Cartão de Débito">Cartão de Débito</option>
                            <option value="Cartão de Crédito">Cartão de Crédito</option>
                            <option value="Boleto Bancário">Boleto Bancário</option>
                        </select>
                    </div>
                </div>
                <div id="card-credito" class="row" style="display: none;">
                    <div class="form-group mb-2">
                        <label>Quantidade de parcelas</label>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <select name="amount_portion" id="item" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    
                    <button type="button" class="btn btn-primary mb-2 btn-action">Gerar Parcelas</button>
                </div>
                <div id="total" class="row" style="display: none;">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Valor Total: {{ $product->price }}</label>
                            <input type="hidden" name="price" class="form-control" value="{{ $product->price }}">
                        </div>
                        <button type="submit" class="btn btn-success mb-2">Finalizar</button>
                    </div>
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="offset-md-6">
            </div>
            
            <div id="formPay" class="class="col-md-6>
                <!-- load -->
            </div>
            
        </div>
    </form>
    <button type="button" class="btn btn-danger"  onclick="window.history.back()"> << Voltar</button>
</div>


<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#pay').on('change', function () {
            var pay = $(this).val()
            
            if (pay != "Cartão de Crédito") {
                $('#total').show()
                $('#card-credito').hide()
                $('#formPay').html('')
            } else {
                $('#total').hide()
                $('#card-credito').show()
            }
        })

        $('.btn-action').on('click', function () {
            var item = $('#item').val()
            $('#formPay').html('')

            for (var i = 1; i <= item; i++) {

                $('#formPay').append('<div class="row">'+
                                        '<div class="form-group mb-2">'+
                                            '<label>Data:</label>'+
                                            '<input type="date" name="date[]" class="form-control" placeholder="Data de Vencimento" required>'+
                                        '</div>'+
                                        '<div class="form-group mb-2">'+
                                            '<label>Valor:</label>'+
                                            '<input type="text" name="price[]" class="form-control" placeholder="R$ 00,00" required>'+
                                        '</div>'+
                                    '</div>')


                if (i == item) {
                    $('#formPay').append('<button type="submit" class="btn btn-success mb-2">Finalizar</button>')
                }
            }
           
        });
    });
</script>

@endsection