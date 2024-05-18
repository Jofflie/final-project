<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Faktur</h1>
    @php
        $totalPrice=0;
    @endphp
    <div>
        <label for="">Invoice Id: </label>
        {{ $faktur->id }}
    </div>
    <label for="">Alamat: </label> {{ $faktur->alamat_pengiriman}} <br>
    <label for="">Kode pos: </label> {{ $faktur->kode_pos }} <br>

    @foreach ($products as $product)
        @php
            $subTotal=$product->harga * $faktur->kuantitas; 
            $totalPrice+=$subTotal;
        @endphp
         
        <li>
            {{ $product->kategori->nama_kategori }}
            <br>
            {{ $product->nama }} {{ $faktur->kuantitas }}x  Price: {{$product->harga}}
            Subtotal: {{ $subTotal }}
        </li>
    @endforeach

        <div>
            <p>Total price: {{ $totalPrice }}</p>
        </div>

        
    
</body>
</html>