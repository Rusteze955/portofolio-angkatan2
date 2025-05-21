<?php
//tas

$buah = ['mangga', 'apel', 'pisang', 'lemon'];
print_r($buah);
echo "<br>";
echo "<br>";
echo $buah[0];
echo "<br>";
echo $buah[1];
echo "<br>";
echo $buah[2];
echo "<br>";
echo $buah[3];
echo "<br>";

foreach ($buah as $b) {
    echo "Nama-nama buah" . $b . "<br>";
}

//array asosiatif : key menggunakan string
$kelas_web = [
    "nama" => "Reyhan",
    "umur" => "20",
    "jurusan" => "teknik infromatika"
];
echo "Nama Siswa" . $kelas_web['nama'] . "Umur" . $kelas_web['umur'] . "Jurusan" . $kelas_web['jurusan'];
echo "<br>";
echo "<br>";

$siswa = [
    [
        "nama" => "reyhan",
        "umur" => "20",
        "jurusan" => "teknik informatika",
    ],
    [
        "nama" => "budi",
        "umur" => "25",
        "jurusan" => "teknik sipil",
    ],
];
print_r($siswa);
echo "<br>";
// echo $siswa[0]['nama'];
foreach ($siswa as $key => $sw) {
    echo "key:" . $key . "<br>";
    echo "Nama : " . $sw['nama'] . "<br>";
    echo "Umur : " . $sw['umur'] . "<br>";
    echo "Jurusan : " . $sw['jurusan'] . "<br>";
}
echo $siswa[0]['nama'];
