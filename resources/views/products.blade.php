@extends('layouts.app')

@section('content')
<div class="content">
    <ul id="listaProducts">
        @forelse ($productos as $prod)
        <li>{{ $prod->name }} ({{ $prod->type }}) - {{ $prod->price }}€</li>
        @empty
        <p>No products</p>
        @endforelse
    </ul>
    {{ old('price') }}
    <form method="post">
        {{ csrf_field() }}
        <label for="price">Precio minimo</label>
        <input type="text" name="price" value="{{ old('price') }}">
        <input type="button" id="myajax" value="pedir">
    </form>
</div>
<script>
    $('#myajax').click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'products',
            data: {
                price: $('[name="price"]').val()
            },
            type: 'post',
            success: function(response) {
                $('#listaProducts').html('');
                $.each(response,function(index,value){  
                    $('#listaProducts').append($('<li>').append(value.name+' '+ value.price+'€'))
                })
            },
        });
    })
</script>



@endsection