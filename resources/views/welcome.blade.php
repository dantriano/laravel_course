@extends('layouts.app')

@section('content')
            <div class="content">
                <div class="title m-b-md">
                    Laravel Demo
                </div>

                <div class="links">
                    <a href="{{ url('/products/') }}">Products Filter</a>
                    <a href="{{ url('/products/?axios=true') }}">Fiter Axios</a>
                    <a href="{{ url('/products/new') }}">New Product</a>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
