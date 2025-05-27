<?php
if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $position_name = $_POST['position_name'];
    $birthday = $_POST['birthday'];
    $website = $_POST['website'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $degree = $_POST['degree'];
    $email = $_POST['email'];
    $freelance = $_POST['freelance'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $fileName = uniqid() . "_" . basename($photo);
    $filePath = "uploads/" . $fileName;

    $size = $_FILES['photo']['size'];

    // mencari apakah di dalam tabel profiles ada data nya, jika ada maka update, jika tidak maka insert mysqli_num_row()
    $queryProfile = mysqli_query($config, "SELECT * FROM abouts ORDER BY id DESC");
    if (mysqli_num_rows($queryProfile) > 0) {
        $rowProfile = mysqli_fetch_assoc($queryProfile);
        $id = $rowProfile['id'];

        // jika user upload gambar
        if (!empty($photo)) {

            unlink("uploads/" . $rowProfile['photo']);
            move_uploaded_file($tmp_name, $filePath);

            $update = mysqli_query($config, "UPDATE abouts SET name='$name', position_name='$position_name', photo='$fileName', birthday='$birthday', website='$website', phone='$phone', city='$city', age='$age', degree='$degree', email='$email', freelance='$freelance', description='$description', status='$status' WHERE id = '$id'");
            header("location:?page=manage-profile&ubah=berhasil");
        } else {
            // PERINTAH UPDATE
            $update = mysqli_query($config, "UPDATE abouts SET name='$name', position_name='$position_name', photo='$fileName', birthday='$birthday', website='$website', phone='$phone', city='$city', age='$age', degree='$degree', email='$email', freelance='$freelance', description='$description', status='$status' WHERE id = '$id'");
            header("location:?page=manage-profile&ubah=berhasil");
        }
    } else {
        // PERINTAH INSERT
        if (!empty($photo)) {
            move_uploaded_file($tmp_name, $filePath);
            // JIKA USER MENGUPLOAD FOTO
            $insertQ = mysqli_query($config, "INSERT INTO abouts (name, position_name, photo, birthday, website, phone, city, age, degree, email, freelance, description, status) VALUES ('$name', '$position_name', '$fileName', '$birthday', '$website', '$phone', '$city', '$age', '$degree', '$email', '$freelance', '$description', '$status')");
            header("location:?page=manage-profile&ubah=berhasil");
        } else {
            // JIKA USER TIDAK MENGUPLOAD FOTO
            $insertQ = mysqli_query($config, "INSERT INTO abouts (name, position_name, birthday, website, phone, city, age, degree, email, freelance, description, status) VALUES ('$name', '$position_name', '$birthday', '$website', '$phone', '$city', '$age', '$degree', '$email', '$freelance', '$description', '$status')");
            header("location:?page=manage-profile&ubah=berhasil");
        }

        // .png, .jpg, .jpeg
        // $ekstensi = ['png', 'jpg', 'jpeg'];
        // // apakah user mengupload gambar dengan ekstensi tersebut? jika iya masukkan gambar ke table dan folder, jika tidak error, ekstensi tidak di temukan
        // // in_array =
        // $ext = pathinfo($photo, PATHINFO_EXTENSION);
        // if (!in_array($ext, $ekstensi)) {
        //     $error[] = "Mohon maaf, ekstensi tidak di temukan";
        // } else {
        //     $query = mysqli_query($config, "INSERT INTO abouts (name, position_name, photo, birthday, website, phone, city, age, degree, email, freelance, description, status) VALUES ('$name', '$position_name', '$photo', '$birthday', '$website', '$phone', '$city', '$age', '$degree', '$email', '$freelance', '$description', '$status')");
        //     if ($query) {
        //         header("location:?page=profile&tambah=berhasil");
        //     }
        // }
    }
}
if (isset($_GET['del'])) {
    $idDel = $_GET['del'];
    $selectPhoto = mysqli_query($config, "SELECT photo FROM abouts WHERE id = '$idDel'");
    unlink("uploads/" . $rowPhoto['photo']);
    $delete = mysqli_query($config, "DELETE FROM abouts WHERE id = '$idDel'");
}
$selectProfile = mysqli_query($config, "SELECT * FROM abouts");
$rowEdit = mysqli_fetch_assoc($selectProfile);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama *</label>
        </div>
        <div class="col-sm-10">
            <input required name="name" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['name']) ? $rowEdit['name'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Position Name *</label>
        </div>
        <div class="col-sm-10">
            <input required name="position_name" type="text" class="form-control" placeholder="Masukkan Email Anda" value="<?= isset($rowEdit['position_name']) ? $rowEdit['position_name'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Birthday *</label>
        </div>
        <div class="col-sm-10">
            <input required name="birthday" type="date" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['birthday']) ? $rowEdit['birthday'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Website *</label>
        </div>
        <div class="col-sm-10">
            <input required name="website" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['website']) ? $rowEdit['website'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Phone *</label>
        </div>
        <div class="col-sm-10">
            <input required name="phone" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['phone']) ? $rowEdit['phone'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">City *</label>
        </div>
        <div class="col-sm-10">
            <input required name="city" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['city']) ? $rowEdit['city'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Age *</label>
        </div>
        <div class="col-sm-10">
            <input required name="age" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['age']) ? $rowEdit['age'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Degree *</label>
        </div>
        <div class="col-sm-10">
            <input required name="degree" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['degree']) ? $rowEdit['degree'] : '' ?>">
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
            <label for="">Freelance *</label>
        </div>
        <div class="col-sm-10">
            <input required name="freelance" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['freelance']) ? $rowEdit['freelance'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Foto *</label>
        </div>
        <div class="col-sm-10">
            <input name="photo" type="file">
            <img src="<?php echo "uploads/" . $rowEdit['photo'] ?>" alt="">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="">Description *</label>
            <textarea id="summernote" class="form-control" name="description" cols="30" rows="5" <?= isset($rowEdit['description']) ? $rowEdit['description'] : '' ?>></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Status</label>
        </div>
        <div>
            <input type="radio" name="status" value="1" checked> Publish
            <input type="radio" name="status" value="0"> Draft
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>