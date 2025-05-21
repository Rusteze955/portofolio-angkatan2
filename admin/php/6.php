<!-- variabel system : var yang dibuat oleh php 
$_POST, $_GET, $_SESSION, $_SERVER, $_FILES, $_REQUEST 
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variabel System | Superglobal var</title>
</head>

<body>
    <form action="" method="post">
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" placeholder="Masukkan Nama Anda">
        </div>
        <br>
        <div class="form-group">
            <label for="">Nilai</label>
            <input type="number" name="nilai" placeholder="Masukkan Nilai Anda">
        </div>
        <div class="from-group">
            <button type="submit">Kirim</button>
        </div>
    </form>

    <?php
    if (isset($_POST['nama'])) {
        $nama = $_POST['nama'];
        $nilai = $_POST['nilai'];
        $grade = "";
        $sattus = "";
        if ($nilai > 70) {
            $status = "Anda Lulus";
        } else {
            $status = "Tidak Lulus";
        }
        if ($nilai >= 90) {
            $grade = "A";
        } elseif ($nilai >= 80) {
            $grade = "B";
        } elseif ($nilai >= 70) {
            $grade = "C";
        } elseif ($nilai >= 60) {
            $grade = "D";
        } else {
            $grade = "E";
        }
        echo "Nama Peserta :" . $nama . "<br> Nilai :" . $nilai . "<br> Grade :" . $grade . "<br> Status :" . $status;
    }
    // // shorthand / ternery
    // $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    // echo "selamat siang " . $nama;
    ?>
</body>

</html>