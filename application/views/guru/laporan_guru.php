<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Guru</title>
</head>

<body>
    <div class="header">
        <center>
            <img src="{{ public_path('assets/img/KOP.png')}}" style="width:720px;height:130px;">
            <h3>Data Guru SMKS PGRI PAKISAJI</h3>
        </center>

    </div>
    <table border="1" width="100%" style="text-align:center;" class="table table-bordered table-striped table-responsive">
        <tr>
            <th>No</th>
            <th>Nama Guru</th>
            <th>Status Kepegawaian</th>
            <th>Pendidikan Terakhir</th>
            <th>Nomor Telpon</th>
            <th>Email</th>
        </tr>
        <?php
        $no = 1;
        foreach ($guru as $row) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->nama_guru; ?></td>
                <td><?php echo $row->status; ?></td>
                <td><?php echo $row->pendidikan_terakhir; ?></td>
                <td><?php echo $row->no_telp; ?></td>
                <td><?php echo $row->email; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>