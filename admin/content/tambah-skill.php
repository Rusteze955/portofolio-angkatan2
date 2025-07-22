<?php
if (isset($_GET['edit'])){
    $querySkill = mysqli_query($config, "SELECT * FROM skill ORDER BY id DESC");
    $rowEdit = mysqli_fetch_assoc($querySkill);
    $id = $rowEdit['id'];
    if (isset($_POST['save'])){
        $name = $_POST['name'];
        $rating = $_POST['rating'];

        $update = mysqli_query($config, "UPDATE skill SET name='$name', rating='$rating' WHERE id='$id'");
        header("location:?page=skill&edit=berhasil");
    }   
}else{
    if (isset($_POST['save'])){
        $name = $_POST['name'];
        $rating = $_POST['rating'];

        $insert = mysqli_query($config, "INSERT INTO skill (name, rating) VALUES ('$name', '$rating')");
        header("location:?page=skill&tambah=berhasil");
    }
}

?>
<div class="row">
    <div class="col-sm-12">
        <form action="" method="post">
            <div class="mb-3">
                <label for="">Nama *</label>
                <input type="text" name="name" class="form-control" value="<?= isset($_GET['edit']) ? $rowEdit['name'] : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="">Rating *</label>
                <input type="number" min='0' max='100' name="rating" class="form-control" value="<?= isset($_GET['edit']) ? $rowEdit['rating'] : '' ?>" required>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" name="save">Save</button>
            </div>
        </form>
    </div>
</div>