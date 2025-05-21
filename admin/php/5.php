<!-- if: prcabangan dan logika, untuk menjalankan kode berdasarkan kondisi yang dicari -->

<?php
// = memberikan nilai
// == membandingkan
// === membandingkan nilai dengan tipe data nya
// !: tidak
// empty = kosong
// !empty = tidak kosong
// isset = tidak ksosong
$nama = "Mulyono";
if ($nama != "Mulyono") {
    echo "iya";
} else {
    echo "salah";
}

if (empty($nama)) {
    echo "yaa";
} else {
    echo "tidak";
}
echo "<br>";
// operator pembanding
$suhu = 35;
if ($suhu > 37) {
    echo "demam";
} elseif ($suhu >= 35) {
    echo "normal";
} else {
    echo "kedinginan";
}

