<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Komentar Per Postingan</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .header img {
        width: 100px;
        height: 100px;
        float: left;
    }

    .header h1 {
        margin: 0;
        margin-left: -100px;
        font-size: 22px;
    }

    .header p {
        margin: 5px 0;
        font-size: 14px;
    }

    .title {
        text-align: center;
        margin-top: 20px;
        margin-left: 100px;
        font-weight: bold;
        font-size: 18px;
    }

    .status {
        margin: 20px 0;
        font-size: 14px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 40px;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
        font-size: 14px;
    }

    .footer {
        display: flex;
        justify-content: space-between;
        margin-top: 50px;
    }

    .footer .location {
        background-color: red;
        font-size: 14px;
    }

    .footer .signature {
        text-align: right;
        font-size: 14px;
    }

    .footer .signature p {
        margin: 0;
    }

    .footer .signature .name {
        margin-top: 60px;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <img src="<?= base_url("landingasset")?>/images/logo.png" alt="Logo">
            <h1>SDIT BAITURRAHIM</h1>
            <p>Jl. Raya Bukittinggi-Payakumbuh Km4 Parik Putuih Ampang Gadang,</p>
            <p>Kec. Ampek Angkek, Kab. Agam, Sumatera Barat, 26191</p>
            <p>E-Mail: sdit.baiturrahim@gmail.com | Contact: +62 813-7259-4924</p>
        </div>

        <!-- Title Section -->
        <div class="title">
            Laporan Komentar Per Postingan
        </div>
        <!-- Status Section -->
        <div class="status">
            <p>Nama Pemilik: <?= $postingan->name ?></p>
            <p>Judul Postingan: <?= $postingan->title ?></p>
            <p>Tanggal Posting: <?= $postingan->created_at ?></p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>USERNAME</th>
                    <th>Isi komentar</th>
                    <th>Tanggal Komentar</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;  foreach ($laporan as $item) : ?>
                <tr>
                    <td><?= $no?></td>
                    <td><?= $item['username'] ?></td>
                    <td><?= $item['comment'] ?? '-' ?></td>
                    <td><?= $item['created_at']  ?? '-' ?></td>
                </tr>
                <?php   $no++;  endforeach ?>
            </tbody>
        </table>
        <div class="footer">
            <div class="">
            </div>
            <div class="signature">
                Padang, <?= date("d F Y") ?>
                <p>Hormat Kami,</p>
                <p class="name">Administrator</p>
            </div>
        </div>
    </div>

</body>

</html>