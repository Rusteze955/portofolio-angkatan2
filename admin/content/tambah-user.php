<?php
if ($_SESSION['LEVEL'] != 1) {
    echo "<h1>Anda tidak berhak kesini !! </h1>";
    echo "<a href='dashboard.php' class='btn btn-warning'>Kembali</a>";
    die;
    // header("location:dashboard.php?failed=access");
}

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id_level = $_POST['id_level'];
    $password = sha1($_POST['password']);

    $query = mysqli_query($config, "INSERT INTO users (name, email, password, id_level) VALUES ('$name','$email','$password', '$id_level')");
    if ($query) {
        header("location:?page=user&tambah=berhasil");
    }
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM users WHERE id='$id_user'");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id_level = $_POST['id_level'];
    $password = sha1($_POST['password']);

    if ($password == '') {
        $queryUpdate = mysqli_query($config, "UPDATE users SET id_level ='$id_level', name='$name', email='$email' WHERE id='$id_user'");
    }

    $queryUpdate = mysqli_query($config, "UPDATE users SET id_level='$id_level', name='$name', email='$email', password='$password' WHERE id='$id_user'");
    if ($queryUpdate) {
        header("location:?page=user&ubah=berhasil");
    }
}

$queryLevels = mysqli_query($config, "SELECT * FROM levels ORDER BY id DESC");
$rowLevels = mysqli_fetch_all($queryLevels, MYSQLI_ASSOC);
?>

<div class="card-body">
    <form action="" method="post">
        <div class="mb-3 row">
            <div class="mb-3 row">
                <div class="col-sm-2">
                    <label for="">Nama Level *</label>
                </div>
                <div class="col-sm-10">
                    <select name="id_level" id="" class="form-control">
                        <option value="">Pilih Level</option>
                        <!-- data opton ini di ambil dari table levels -->
                        <?php foreach ($rowLevels as $level): ?>
                            <option <?php echo isset($_GET['edit']) ? ($level['id'] == $rowEdit['id_level']) ? 'selected' : '' : '' ?> value="<?php echo $level['id'] ?>"><?php echo $level['nama_level'] ?></option>
                        <?php endforeach ?>
                        <!-- endoption -->
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-2">
                    <label for="">Nama *</label>
                </div>
                <div class="col-sm-10">
                    <input required name="name" type="nama" class="form-control" placeholder="Masukkan Nama Anda" value="<?= isset($rowEdit['name']) ? $rowEdit['name'] : '' ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-2">
                    <label for="">Email *</label>
                </div>
                <div class="col-sm-10">
                    <input required name="email" type="email" class="form-control" placeholder="Masukkan Email Anda" value="<?= isset($rowEdit['email']) ? $rowEdit['email'] : '' ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-2">
                    <label for="">Password *</label>
                </div>
                <div class="col-sm-10">
                    <input required name="password" type="password" class="form-control" placeholder="Masukkan Password Anda">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-12">
                    <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="sumbit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
    </form>
</div>