<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{ $product->nama }}</h1>
    <p>
        product kategori: {{$product->kategori}}
        <br>
        product harga: {{$product->harga}}
        <br>
        product jumlah: {{$product->jumlah}}
        <br>
        product foto: 
        <br>
        <img src="{{asset($product->foto)}}" alt="">
    </p>

    <h2>Add this product to faktur</h2>
    <form action="{{ route('faktur.store') }}" method="POST">
    @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <button>submit</button>
    </form>
</body>
</html>