<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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
                    <h1 class="font_size">Ürün Güncelleme</h1>
                    <form action="{{ url('/update_product_confirm',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label>Ürün Başlığı</label>
                            <input class="text_color" type="text" name="title" placeholder="Başlık Yazınız"
                                required="" value="{{ $product->title }}">
                        </div>

                        <div class="div_design">
                            <label>Ürün Açıklama</label>
                            <input class="text_color" type="text" name="description" placeholder="Ürün Açıklama"
                                required="" value="{{ $product->description }}">
                        </div>

                        <div class="div_design">
                            <label>Ürün Fiyat</label>
                            <input class="text_color" type="number" name="price" placeholder="Ürün Fiyat"
                                required="" value="{{ $product->price }}">
                        </div>

                        <div class="div_design">
                            <label>İndirimli Fiyat</label>
                            <input class="text_color" type="number" name="discount_price" placeholder="İndirimli Fiyat"
                                required=""value="{{ $product->discount_price }}">
                        </div>

                        <div class="div_design">
                            <label>Ürün Miktarı</label>
                            <input class="text_color" type="number" name="quantity" min="0"
                                placeholder="Ürün Miktarı" required="" value="{{ $product->quantity }}">
                        </div>

                        <div class="div_design">
                            <label>Ürün Kategori</label>
                            <select class="text_color" name="category" required="">
                                <option value="{{ $product->category }}" selected="">{{ $product->category }}
                                </option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="div_design">
                            <label>Mevcut Ürün Resmi</label>
                            <img style="margin: auto" height="100" width="100"
                                src="/product/{{ $product->image }}">
                        </div>

                        <div class="div_design">
                            <label>Resim Güncelle</label>
                            <input type="file" name="image"  value="{{ $product->image }}">
                        </div>

                        <div class="div_design">
                            <input type="submit" value="Ürün Güncelle" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.script')
</body>

</html>
