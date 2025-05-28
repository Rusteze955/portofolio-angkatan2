<?php
if (isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];

    $insertQ = mysqli_query($config, "INSERT INTO services (title, icon, description) VALUE('$title', '$description', '$icon')");
    header("location:?page=service&ditambah=berhasil");
}

$selectServices = mysqli_query($config, "SELECT * FROM services ORDER BY id DESC");
$rowServices = mysqli_fetch_all($selectServices, MYSQLI_ASSOC);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Judul *</label>
        </div>
        <div class="col-sm-10">
            <input required name="title" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowService['title']) ? $rowService['title'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Icon *</label>
        </div>
        <div class="col-sm-10">
            <input required name="icon" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowService['icon']) ? $rowService['icon'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Description*</label>
            <textarea id="summernote" class="form-control" name="description" cols=" 30" rows="5" <?= isset($rowService['description']) ? $rowService['description'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>