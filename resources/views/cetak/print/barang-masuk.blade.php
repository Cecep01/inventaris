<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

      <title>Document</title>
</head>
<body>
     <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center bg-primary text-light ">
                Laporan Barang Masuk Tanggal {{  \Carbon\Carbon::parse($start)->format('d, M Y ') }} - {{ \Carbon\Carbon::parse($end)->format('d, M Y') }}
            </div>
            <div class="card-body">
                <table class="table table-striped">
                     <tr>
                                <th>Nomor</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Jurusan</th>
                                <th>Kondisi</th>

                            </tr>

                            @php
                                $no = 1;
                            @endphp
                            @foreach ($laporan as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->nm_barang}}</td>
                                <td>{{$data->stok}}</td>
                                <td>{{$data->jurusan}}</td>
                                <td>{{$data->kondisi}}</td>
                            </tr>
                            @endforeach
                </table>
            </div>
        </div>
</div>
    </div>

     <script type="text/javascript">
         window.print();$
     </script>

</body>
</html>
