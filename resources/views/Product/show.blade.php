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
        product kategori: {{$product->kategori->nama_kategori}}
        <br>
        product harga: {{$product->harga}}
        <br>
        product jumlah: {{$product->jumlah}}
        <br>
        product foto: 
        <br>
        <img src="{{asset($product->foto)}}" alt="">
    </p>
    
</body>
</html>