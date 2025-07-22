<?php
if (isset($_GET['edit'])){
    $querySumary = mysqli_query($config, "SELECT * FROM experience ORDER BY id DESC");
    $rowEdit = mysqli_fetch_assoc($querySumary);
    $id = $rowEdit['id'];
    if (isset($_POST['save'])){
        $name = $_POST['name'];
        $description = $_POST['description'];

        $update = mysqli_query($config, "UPDATE experience SET name='$name', description='$description' WHERE id='$id'");
        header("location:?page=experience&edit=berhasil");
    }   
}else{
    if (isset($_POST['save'])){
        $name = $_POST['name'];
        $description = $_POST['description'];

        $insert = mysqli_query($config, "INSERT INTO experience (name, description) VALUES ('$name', '$description')");
        header("location:?page=experience&tambah=berhasil");
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
            <div class="mb-3 row">
                <div class="col-sm-12">
                    <label for="">Description *</label>
                    <textarea id="summernote" class="form-control" name="description" cols="30" rows="5" ><?= isset($_GET['edit']) ? $rowEdit['description'] : '' ?></textarea>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" name="save">Save</button>
            </div>
        </form>
    </div>
</div>