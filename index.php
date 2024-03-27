<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas php2 nia</title>
</head>

<style>
    .table_a {
        background-color: white;
        width: 35%;
        text-align: justify;
        margin: auto;
        overflow: hidden;
        border-collapse: collapse;
        border-radius: 5px;
        color: black;
    }

    form th {
        background-color: cornflowerblue;
        color: midnightblue;
        text-align: center;
        font-weight: bold;
        padding: 10px;
        border: 1px solid black;  
    }
    
    form td {
        padding: 10px;
        border: 1px solid black;
    }

    table {
        margin-left: auto;
        margin-right: auto;
        margin: 1rem 30rem;
        width: 300px;
        height: 50px;
        width: 22%;
        border-collapse: collapse;
        background-color: lightsteelblue;
    }
    
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
        }
</style>

<body>
<form action="" method="POST">
        <table class="table_a">
            <tr>
                <th colspan="2">
                    <h1>Form Belanja</h1>
                </th>
            </tr>

            <tr>
                <td><label for="nama">Nama Pelanggan</label></td>
                <td><input type="nama" name="nama" id="nama"></td>
            </tr>

            <tr>
                <td><label for="produk">Produk Pilihan</label></td>
                <td><select id="produk" name="produk" class="custom-select">
                <option value="">-- PILIHAN PRODUK--</option>
                <option value="TV">TV</option>
                <option value="KULKAS">KULKAS</option>
                <option value="MESIN CUCI">MESIN CUCI</option>
                <option value="AC">AC</option>
                </select></td>
            </tr>

            <tr>
                <td><label for="jumlah">Jumlah Beli</label></td>
                <td><input type="jumlah" name="jumlah" id="jumlah"></td>
            </tr>

            <tr>
                <th colspan="2">  
                <button style="width: 20%; padding: 1%;" name="proses" type="submit" class="btn btn-primary">Beli</button>
                <button style="width: 20%; padding: 1%;" name="unproses" type="reset" class="btn btn-success">Batal</button>
                </th>
            </tr>
        </table>
</form>
</body>
</html>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $hargasatuan = 0;

    switch ($produk) {
        case 'TV':
            $hargasatuan = 1250000;
            break;
        case 'KULKAS':
            $hargasatuan = 500000;
            break;
        case 'MESIN CUCI':
            $hargasatuan = 1000000;
            break;
        case 'AC':
            $hargasatuan = 750000;
            break;
    }

    $totalbelanja = $jumlah * $hargasatuan;
    $diskon = 0.2 * $totalbelanja;
    $ppn = 0.1 * ($totalbelanja - $diskon);
    $hargabersih = ($totalbelanja - $diskon) + $ppn;

    echo "
    <table>
        <tr>
            <td>Nama Pelanggan</td>
            <td>: $nama</td>
        </tr>
        <tr>
            <td>Produk Pilihan</td>
            <td>: $produk</td>
        </tr>
        <tr>
            <td>Jumlah Beli</td>
            <td>: $jumlah</td>
        </tr>
        <tr>
            <td>Harga Satuan</td>
            <td>: $hargasatuan</td>
        </tr>
        <tr>
            <td>Total Belanja</td>
            <td>: $totalbelanja</td>
        </tr>
        <tr>
            <td>Diskon 20%</td>
            <td>: $diskon</td>
        </tr>
        <tr>
            <td>PPN 10%</td>
            <td>: $ppn</td>
        </tr>
        <tr>
            <td>Harga Bersih</td>
            <td>: $hargabersih</td>
        </tr>
    </table>
    ";
}
?>
