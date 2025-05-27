<?php 
if (isset($_POST['simpan'])) {
    $description_1 = $_POST['description_1'];
    $description_2 = $_POST['description_2'];
    $description_3 = $_POST['description_3'];
    $description_4 = $_POST['description_4'];

    $insertQ = mysqli_query($config, "INSERT INTO services (description_1, description_2, description_3, description_4) VALUE('$description_1', '$description_2', '$description_3', '$description_4')");
    header("location:?page=service&ditambah=berhasil");
}

$selectServices = mysqli_query($config, "SELECT * FROM services ORDER BY id DESC");
$rowServices = mysqli_fetch_all($selectServices, MYSQLI_ASSOC);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Description_1 *</label>
            <textarea id="summernote_1" class="form-control" name="description_1" cols="30" rows="5" <?= isset($rowEdit['description_1']) ? $rowEdit['description_1'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Description_2 *</label>
            <textarea id="summernote_2" class="form-control" name="description_2" cols="30" rows="5" <?= isset($rowEdit['description_2']) ? $rowEdit['description_2'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Description_3 *</label>
            <textarea id="summernote_3" class="form-control" name="description_3" cols="30" rows="5" <?= isset($rowEdit['description_3']) ? $rowEdit['description_3'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Description_4 *</label>
            <textarea id="summernote_4" class="form-control" name="description_4" cols="30" rows="5" <?= isset($rowEdit['description_2']) ? $rowEdit['description_2'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>