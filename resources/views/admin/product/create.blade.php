@extends('layouts.admin')

@section('title', 'Cadastro Produto')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 offset-md-3">
            <h1>Cadastro Produto</h1>

            <form action="/products" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Título</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" required placeholder="">
                </div>
              
                <div class="form-group">
                    <label for="exampleFormControlInput1">Thumb</label>
                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Preço</label>
                    <input type="text" name="price" class="form-control" id="exampleFormControlInput1" required placeholder="R$ 100, 00">
                </div> 
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrição</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" required rows="3"></textarea>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="is_active" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Ativo</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection