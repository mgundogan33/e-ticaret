<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 30px;
            padding-bottom: 20px;
        }

        .text_color {
            color: black;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
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
                <div class="div_center">
                    <h1 class="font_size">Ürün Ekle</h1>
                    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label>Ürün Başlığı</label>
                            <input class="text_color" type="text" name="title" placeholder="Başlık Yazınız"
                                required="">
                        </div>

                        <div class="div_design">
                            <label>Ürün Açıklama</label>
                            <input class="text_color" type="text" name="description" placeholder="Ürün Açıklama"
                                required="">
                        </div>

                        <div class="div_design">
                            <label>Ürün Fiyat</label>
                            <input class="text_color" type="number" name="price" placeholder="Ürün Fiyat"
                                required="">
                        </div>

                        <div class="div_design">
                            <label>İndirimli Fiyat</label>
                            <input class="text_color" type="number" name="discount_price" placeholder="İndirimli Fiyat"
                                required="">
                        </div>

                        <div class="div_design">
                            <label>Ürün Miktarı</label>
                            <input class="text_color" type="number" name="quantity" min="0"
                                placeholder="Ürün Miktarı" required="">
                        </div>

                        <div class="div_design">
                            <label>Ürün Kategori</label>
                            <select class="text_color" name="category" required="">
                                <option value="" selected="">Kategori Ekleyin</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="div_design">
                            <label>Ürün Resmi</label>
                            <input type="file" name="image" required="">
                        </div>

                        <div class="div_design">
                            <input type="submit" value="Ürün Ekle" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.script')
</body>

</html>
