<?php
if (isset($_POST['simpan'])) {
    $description_testi = $_POST['description_testi'];
    $description = $_POST['description'];
    $name = $_POST['name'];
    $profession = $_POST['profession'];

    $insertQ = mysqli_query($config, "INSERT INTO testimonial (description_testi, description, name, profession) VALUE ('$description_testi', '$description', '$name', '$profession')");
    header("location:?page=testimonial&ditambah=berhasil");
}

$selectTestimonial = mysqli_query($config, "SELECT * FROM testimonial ORDER BY id DESC");
$rowTestimonial = mysqli_fetch_all($selectTestimonial, MYSQLI_ASSOC);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Description Testimonial *</label>
            <textarea id="summernote_1" class="form-control" name="description_testi" cols="30" rows="5" <?= isset($rowEdit['description_testi']) ? $rowEdit['resume_tabel'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Description *</label>
            <textarea id="summernote_2" class="form-control" name="description" cols="30" rows="5" <?= isset($rowEdit['description']) ? $rowEdit['description'] : '' ?>></textarea>
        </div>
    </div>
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
            <label for="">Profession *</label>
        </div>
        <div class="col-sm-10">
            <input required name="profession" type="text" class="form-control" placeholder="Masukkan Profesi Anda" value="<?= isset($rowEdit['profession']) ? $rowEdit['position_name'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>