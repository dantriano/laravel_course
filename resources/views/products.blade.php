@extends('layouts.app')
@section('content')
<div>

</div>
<div class="content">
    <h1>Lista de Productos</h1>
    <ul id="productsList" class="list-group">
        @forelse ($productos as $prod)
        <li class="list-group-item">{{ $prod->name }} ({{ $prod->type }}) - {{ $prod->price }}€</li>
        @empty
        <p>No products</p>
        @endforelse
    </ul>
    <br><br>
    <div class="card">
        <div class="card-body">
            <h3>Filtrar Productos</h3>
            <form id="filterForm" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="priceMin">Precio Min</label>
                    <input id="priceMin" type="text" name="priceMin" value="{{ old('priceMin') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="priceMax">Precio Max</label>
                    <input id="priceMax" type="text" name="priceMax" value="{{ old('priceMax') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Type</label>
                    <input id="type" type="text" name="type" value="{{ old('type') }}" class="form-control">
                </div>
                <!--<div class="form-check">
                    <input type="checkbox" class="form-check-input" id="axios" name="axios">
                    <label class="form-check-label" for="exampleCheck1">Axios</label>
                </div>-->
                <input type="submit" value="Filter" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<script>
    /*$('#filterForm').submit(function(e) { 
        e.preventDefault()
        axios.post('products', {
                price: $('[name="price"]').val(),
                name: $('#name').val()
            })
            .then(response => {
                $('.content').html(response)
            })
    })*/
</script>


@endsection