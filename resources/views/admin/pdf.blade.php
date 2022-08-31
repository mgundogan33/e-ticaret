<!DOCTYPE html>
<html lang="en">

<head>
    <title>PDF Sipariş</title>
</head>

<body>
    <h1>Sipariş Detayı</h1>
    Müşteri İsmi :<h3>{{ $order->name }}</h3>
    Müşteri Email :<h3>{{ $order->email }}</h3>
    Müşteri Telefon :<h3>{{ $order->phone }}</h3>
    Müşteri Adress :<h3>{{ $order->address }}</h3>
    Müşteri No :<h3>{{ $order->user_id }}</h3>

    Ürün İsmi :<h3>{{ $order->product_title }}</h3>
    Ürün Fiyat :<h3>{{ $order->price }}</h3>
    Ürün Miktar:<h3>{{ $order->quantity }}</h3>
    Ödeme Durumu:<h3>{{ $order->payment_status }}</h3>
    Ürün No:<h3>{{ $order->product_id }}</h3>
    <br><br>
    <img height="250" width="450" src="product/{{ $order->image }}">
</body>

</html>
