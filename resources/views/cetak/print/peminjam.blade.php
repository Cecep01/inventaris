<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        table.static {
            position: relative;
            border: 1 px solid #545454;
        }
    </style>
      <title>Document</title>
</head>
<body>
     <div class="form-group">
         <p align="center"> <b>Laporan Peminjam</b></p>
         <table class="static" align="center" rules="alt" border="1px" style="width : 95%">

         <tr>
                                <th>Nomor</th>
                                <th>Nama Peminjam</th>
                                <th>No Telepon</th>
                                <th>Jumlah</th>
                                <th>Nama Barang</th>

                            </tr>

                            @php
                            $no = 1;
                        @endphp
                        @foreach ($laporan as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->nm_peminjam}}</td>
                            <td>{{$data->no_tlp}}</td>
                            <td>{{$data->jumlah}}</td>
                            <td>{{$data->barang->nm_barang}}</td>

                            @endforeach
        </table>
     </div>
     <script type="text/javascript">
         window.print();$
     </script>

</body>
</html>
