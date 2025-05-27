<?php
if (isset($_POST['simpan'])) {
    $description = $_POST['description'];
    $photo_1 = $_POST['photo_1'];
    $photo_2 = $_POST['photo_2'];
    $photo_3 = $_POST['photo_3'];
    header("location:?page=portofoilio&hapus=berhasil");
}

$query = mysqli_query($config, "SELECT * FROM contacts ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Description *</label>
            <textarea id="summernote" class="from-control" name="description" cols="30" rows="5" <?= isset($rowEdit['description']) ? $rowEdit['description'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Foto 1 *</label>
        </div>
        <div class="col-sm-10">
            <input name="photo" type="file">
            <img src="<?php echo "uploads/" . $rowEdit['photo_1'] ?>" alt="">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Foto 2 *</label>
        </div>
        <div class="col-sm-10">
            <input name="photo" type="file">
            <img src="<?php echo "uploads/" . $rowEdit['photo_2'] ?>" alt="">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Foto 3 *</label>
        </div>
        <div class="col-sm-10">
            <input name="photo" type="file">
            <img src="<?php echo "uploads/" . $rowEdit['photo_3'] ?>" alt="">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>