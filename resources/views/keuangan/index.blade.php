<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body class="bg-light">
    <main class="container">      
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-1">TahunID</th>
                        <th class="col-md-3">Semester</th>
                        <th class="col-md-2">Jenis Tagihan</th>
                        <th class="col-md-2" >Jumlah</th>
                        <th class="col-md-4" style='text-align:center'>Batas Pembayaran Awal</th> 
                        <th class="col-md-4" style='text-align:center'>Batas Pembayaran Akhir</th>
                        <th class="col-md-2">Status Pembayaran</th>
                        <th class="col-md-2">Nomor VA</th>                       
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item['kd_semester'] }}</td>
                        <td>{{ $item['semester'] }}</td>
                        <td>{{ $item['jenis_pembayaran'] }}</td>
                        <td>{{ $item['jumlah_tagihan'] }}</td>
                        <td>{{ $item['batas_tanggal_pembayaran_awal'] }}</td>
                        <td>{{ $item['batas_tanggal_pembayaran_akhir'] }}</td>
                        <td>{{ $item['status_pembayaran'] }}</td>
                        <td>{{ $item['nomor_va'] }}</td>                    
                    </tr>
                    <?php $i++  ?>
                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- AKHIR DATA -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>