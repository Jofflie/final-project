<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Product Lists</h1>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->nama }} <a href="{{ route('product.show',$product->slug) }}">Show</a></li>
            <img src="{{asset($product->foto)}}" alt="">
            <a href="{{ route('product.edit', $product->slug) }}">Edit</a>
            <form action="{{ route('product.delete', $product->slug)}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        @endforeach
    </ul>


</body>
</html>