<?php
if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $rating = $_POST['rating'];

    $insertQ = mysqli_query($config, "INSERT INTO skill (name, rating) VALUE ('$name', '$rating')");
    header("location:?page=skill&tambah=berhasil");
}

$selectSkill = mysqli_query($config, "SELECT * FROM skill ORDER BY id DESC");
$rowSkill = mysqli_fetch_assoc($selectSkill);
?>
<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Name *</label>
        </div>
        <div class="col-sm-10">
            <input required name="name" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['name']) ? $rowEdit['name'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">rating *</label>
        </div>
        <div class="col-sm-10">
            <input required name="rating" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['rating']) ? $rowEdit['rating'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>