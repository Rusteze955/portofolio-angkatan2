<?php
if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $postion_name = $_POST['position_name'];
    $birthday = $_POST['birthday'];
    $website = $_POST['website'];
    $phone = $_POST['phone'];
    $city = $_POST['name'];
    $age = $_POST['age'];
    $degree = $_POST['degree'];
    $email = $_POST['email'];
    $freelance = $_POST['freelance'];
    $status = $_POST['status'];
    $photo = $_FILES['photo']['name'];
    $size = $_FILES['photo']['size'];

    // .png, .jpg, .jpeg
    $esktensi = ['png', 'jpg', 'jpeg'];
    // apakah user mengupload gambar dengan ekstensi tersebut? jika iya masukkan gambar ke table dan folder, jika tidak error, ekstensi tidak di temukan
    // in_array =
    $ext = pathinfo($photo, PATHINFO_EXTENSION);
    if (in_array($ext, $ekstensi)) {
        $error[] = "Mohon maaf, ekstensi tidak di temukan";
    } else {
        $query = mysqli_query($config, "INSERT INTO abouts (name, position_name, photo, birthday, website, phone, city, age, degree, email, freelance, status) VALUES ('$name', '$position_name', '$photo', '$birthday', '$website', '$phone', '$city', '$age', '$degree', '$email', '$freelance', '$status')");
        if ($query) {
            header("location:?page=profile&tambahberhasil");
        }
    }
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM users WHERE id='$id_user'");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    if ($password == '') {
        $queryUpdate = mysqli_query($config, "UPDATE users SET name='$name', email='$email' WHERE id='$id_user'");
    }

    $queryUpdate = mysqli_query($config, "UPDATE users SET name='$name', email='$email', password='$password' WHERE id='$id_user'");
    if ($queryUpdate) {
        header("location:user.php?ubah=berhasil");
    }
}
?>

<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama *</label>
        </div>
        <div class="col-sm-10">
            <input required name="name" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($_GET['edit']) ? $rowEdit['name'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Position Name *</label>
        </div>
        <div class="col-sm-10">
            <input required name="postion_name" type="text" class="form-control" placeholder="Masukkan Email Anda" value="<?= isset($_GET['edit']) ? $rowEdit['position_name'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Birthday *</label>
        </div>
        <div class="col-sm-10">
            <input required name="birthday" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($_GET['edit']) ? $rowEdit['birthday'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Website *</label>
        </div>
        <div class="col-sm-10">
            <input required name="website" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($_GET['edit']) ? $rowEdit['website'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Phone *</label>
        </div>
        <div class="col-sm-10">
            <input required name="phone" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($_GET['edit']) ? $rowEdit['phone'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">City *</label>
        </div>
        <div class="col-sm-10">
            <input required name="city" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($_GET['edit']) ? $rowEdit['city'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Age *</label>
        </div>
        <div class="col-sm-10">
            <input required name="age" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($_GET['edit']) ? $rowEdit['age'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Degree *</label>
        </div>
        <div class="col-sm-10">
            <input required name="degree" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($_GET['edit']) ? $rowEdit['degree'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Email *</label>
        </div>
        <div class="col-sm-10">
            <input required name="email" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Freelance *</label>
        </div>
        <div class="col-sm-10">
            <input required name="freelance" type="text" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($_GET['edit']) ? $rowEdit['freelance'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Foto *</label>
        </div>
        <div class="col-sm-10">
            <input name="photo" type="file">
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
            <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="sumbit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>