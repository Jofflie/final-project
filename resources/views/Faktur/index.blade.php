<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>User faktur</h1>
    @php
        $totalPrice=0;
    @endphp
    <div>
        <label for="">Alamat pengiriman</label>
        <input type="text" name="alamat_pengiriman">
    </div>
    <div>
        <label for="">Alamat pengiriman</label>
        <input type="text" name="kode_pos">
    </div>

    @foreach ($fakturs as $faktur)
    @php
        $subTotal=$faktur->product->harga * $faktur->kuantitas;
        $totalPrice+=$subTotal;
    @endphp
    <div>
        <label for="">Invoice Id: </label>
        {{ $faktur->id }}
    </div> 
    <li>
        {{ $faktur->product->kategori }}
        <br>
        {{ $faktur->product->name }} {{ $faktur->kuantitas }}x  Price: {{$faktur->product->harga}}
        Subtotal: {{ $subTotal }}
    </li>

    <div>
        <p>Total price: {{ $totalPrice }}</p>
    </div>
        
        
        
        
    @endforeach

</body>
</html>