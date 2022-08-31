<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="text/css">
        .title_deg {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }

        .table_deg {
            border: 2px solid white;
            width: 100%;
            margin: auto;
            padding-top: 50px;
            text-align: center;
        }

        .th_deg {
            background-color: skyblue;
        }

        .img_size {
            width: 200px;
            height: 100px;
            ;
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="title_deg">Tüm Siparişler</h1>
                <table class="table_deg">
                    <tr class="th_deg">
                        <th style="padding: 10px;">İsim</th>
                        <th style="padding: 10px;">Email</th>
                        <th style="padding: 10px;">Telefon</th>
                        <th style="padding: 10px;">Adres</th>
                        <th style="padding: 10px;">Ürün Başlığı</th>
                        <th style="padding: 10px;">Ürün Miktarı</th>
                        <th style="padding: 10px;">Fiyat</th>
                        <th style="padding: 10px;">Ödeme Durumu</th>
                        <th style="padding: 10px;">Teslim Durumu</th>
                        <th style="padding: 10px;">Resim</th>
                        <th style="padding: 10px;">Teslim Durumu</th>
                        <th style="padding: 10px;">PDF Yazdır</th>

                    </tr>
                    @foreach ($order as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->product_title }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->delivery_status }}</td>
                            <td>
                                <img class="img_size" src="/product/{{ $order->image }}" alt="">
                            </td>
                            <td>
                                @if ($order->delivery_status != 'işlem')
                                    <a href="{{ url('delivered', $order->id) }}" onclick="return confirm('Bu Ürünün Teslim Edildiğinden Eminmisiniz !!')" class="btn btn-primary">Teslim
                                        Edildi</a>
                                @else                                
                                    <p>Teslim Edildi</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('print_pdf',$order->id) }}" class="btn btn-success">PDF Yazdır</a>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>

    </div>
    @include('admin.script')
</body>

</html>
