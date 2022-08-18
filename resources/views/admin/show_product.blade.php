<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="">
        .center {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }

        .font_size {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }

        .img_size {
            height: 110px;
            width: 110px;
        }

        .th_color {
            background: skyblue;
        }

        .th_deg {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')


        <div class="main-panel">
            <div class="content-wrapper">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss='alert' aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <h2 class="font_size">Ürünler</h2>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Ürün Başlığı</th>
                        <th class="th_deg">Açıklama</th>
                        <th class="th_deg">Ürün Miktarı</th>
                        <th class="th_deg">Kategori</th>
                        <th class="th_deg">Ürün Fiyat</th>
                        <th class="th_deg">İndirimli Fiyat</th>
                        <th class="th_deg">Ürün Resmi</th>
                        <th class="th_deg">Sil</th>
                        <th class="th_deg">Güncelle</th>
                    </tr>
                    @foreach ($product as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->category }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->discount_price }}</td>
                            <td>
                                <img class="img_size" src="/product/{{ $product->image }} ">
                            </td>
                            <td>
                                <a class="btn btn-danger" onclick="return confirm('Silmek İstediğinize Eminmisiniz')"
                                    href="{{ url('delete_product', $product->id) }}">Sil</a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{ url('update_product',$product->id) }}">Güncelle</a>
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
