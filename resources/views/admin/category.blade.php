<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
        }

        .h2_font {
            font-size: 30px;
            padding-bottom: 20px;
        }

        .input_color {
            color: black;
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
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
                    <h2 class="h2_font">Kategori Oluştur</h2>
                    <form  action="{{ url('/add_category') }}" method="POST">
                        @csrf
                        <input class="input_color" type="text" name="category" placeholder="Kategori Adını Yaz">

                        <input type="submit" class="btn btn-primary" name="submit" value="Kategori Ekle">
                    </form>
                </div>
                <table class="center">
                    <tr>
                        <td>Kategori Adı</td>
                        <td>Düzenle</td>
                    </tr>
                    @foreach ($data as $data)                           
                    <tr>
                        <td>{{ $data->category_name }}</td>
                        <td>
                            <a  onclick="return confirm('Silmek İstediğinize Eminmisiniz')" class="btn btn-danger" href="{{ url('delete_category',$data->id) }}">Sil</a>
                        </td>
                    </tr>
                    @endforeach

                </table>

            </div>
        </div>

        @include('admin.script')
    </div>
</body>

</html>
