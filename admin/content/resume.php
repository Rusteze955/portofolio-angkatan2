<?php 
if (isset($_POST['simpan'])) {
    $resume_tabel = $_POST['resume_tabel'];
    $name_1 = $_POST['name_1'];
    $resume_1 = $_POST['resume_1'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $title_1 = $_POST['title_1'];
    $tahun_1 = $_POST['tahun_1'];
    $kampus = $_POST['kampus'];
    $resume_2 = $_POST['resume_2'];
    $experience = $_POST['experience'];
    $tahun_2 = $_POST['tahun_2'];
    $address_2 = $_POST['address_2'];
    $isi_1 = $_POST['isi_1'];
    $isi_2 = $_POST['isi_2'];
    $isi_3 = $_POST['isi_3'];

    $insertQ = mysqli_query($config, "INSERT INTO resume (resume_tabel, name_1, resume_1, address, contact, email, title_1, tahun_1, kampus, resume_2, experience, tahun_2, address_2, isi_1, isi_2, isi_3) VALUE ('$resume_tabel', '$name_1', '$resume_1', '$address', '$contact', '$email', '$title_1', '$tahun_1', '$kampus', '$resume_2', '$experience', '$tahun_2', '$address_2', '$isi_1', '$isi_2', '$isi_3')");
    header("location:?page=resume&ditambah=berhasil");
}
$selectResume = mysqli_query($config, "SELECT * FROM resume ORDER BY id DESC");
$rowResume = mysqli_fetch_all($selectResume, MYSQLI_ASSOC);
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Resume Tabel *</label>
            <textarea id="summernote_1" class="form-control" name="resume_tabel" cols="30" rows="5" <?= isset($rowEdit['resume_tabel']) ? $rowEdit['resume_tabel'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama *</label>
        </div>
        <div class="col-sm-10">
            <input required name="name_1" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['name_1']) ? $rowEdit['name_1'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Resume_1 *</label>
            <textarea id="summernote_2" class="form-control" name="resume_1" cols="30" rows="5" <?= isset($rowEdit['resume_1']) ? $rowEdit['resume_1'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Address *</label>
            <textarea id="summernote_3" class="form-control" name="address" cols="30" rows="5" <?= isset($rowEdit['address']) ? $rowEdit['address'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Contact *</label>
        </div>
        <div class="col-sm-10">
            <input required name="contact" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['contact']) ? $rowEdit['contact'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Email *</label>
        </div>   
        <div class="col-sm-10">
            <input required name="email" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['email']) ? $rowEdit['email'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Title *</label>
        </div>
        <div class="col-sm-10">
            <input required name="title_1" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['title_1']) ? $rowEdit['title_1'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Tahun_1 *</label> 
        </div>  
        <div class="col-sm-10">
            <input required name="tahun_1" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['tahun_1']) ? $rowEdit['tahun_1'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Kampus *</label>
        </div>
        <div class="col-sm-10">
            <input required name="kampus" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['kampus']) ? $rowEdit['kampus'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Resume_2 *</label>
            <textarea id="summernote_4" class="form-control" name="resume_2" cols="30" rows="5" <?= isset($rowEdit['resume_2']) ? $rowEdit['resume_2'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Experience *</label>
        </div>
        <div class="col-sm-10">
            <input required name="experience" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['experience']) ? $rowEdit['experience'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Tahun_2 *</label>
        </div>
        <div class="col-sm-10">
            <input required name="tahun_2" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['tahun_2']) ? $rowEdit['tahun_2'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Address_2 *</label>
            <textarea id="summernote_5" class="form-control" name="address_2" cols="30" rows="5" <?= isset($rowEdit['address_2']) ? $rowEdit['address_2'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Isi_1 *</label>
            <textarea id="summernote_6" class="form-control" name="isi_1" cols="30" rows="5" <?= isset($rowEdit['isi_1']) ? $rowEdit['isi_1'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Isi_2 *</label>
            <textarea id="summernote_7" class="form-control" name="isi_2" cols="30" rows="5" <?= isset($rowEdit['isi_2']) ? $rowEdit['isi_2'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Isi_3 *</label>
            <textarea id="summernote_8" class="form-control" name="isi_3" cols="30" rows="5" <?= isset($rowEdit['isi_3']) ? $rowEdit['isi_3'] : '' ?>></textarea>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-12">
            <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>