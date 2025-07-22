<?php
$queryHome = mysqli_query($config, "SELECT * FROM home ORDER BY id DESC");
$rowEdit = mysqli_fetch_assoc($queryHome);

if (isset($_POST['save'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $fileName = uniqid() . "_" . basename($photo);
    $filePath = "uploads/" . $fileName;

    $queryHome = mysqli_query($config, "SELECT * FROM home ORDER BY id DESC");
    if (mysqli_num_rows($queryHome) > 0){
        $rowHome = mysqli_fetch_assoc($queryHome);
        $id = $rowHome['id'];

        if(!empty($photo)){
            if(!empty($rowHome['photo'])){
                unlink("uploads/" . $rowHome['photo']);
            }
            move_uploaded_file($tmp_name, $filePath);
            
            $update = mysqli_query($config, "UPDATE home SET name='$name', description='$description', photo='$fileName' WHERE id='$id' ");
        }else{
            $update = mysqli_query($config, "UPDATE home SET name='$name', description='$description' WHERE id='$id' ");
        }
        header("location:?page=manage-home&ubah=berhasil");
    }else{
        if(!empty($photo)){
            move_uploaded_file($tmp_name, $filePath);
            $insert = mysqli_query($config, "INSERT INTO home (name, description, photo) VALUES('$name', '$description', '$fileName')");
        }else{
            $insert = mysqli_query($config, "INSERT INTO home (name, description) VALUES('$name', '$description')");
        }
        header("location:?page=manage-home&tambah=berhasil");
    }

}

?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="">Nama *</label>
                <input type="text" name="name" class="form-control" value="<?= isset($rowEdit['name']) ? $rowEdit['name'] : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="">Description *</label>
                <input type="text" name="description" class="form-control" value="<?= isset($rowEdit['description']) ? $rowEdit['description'] : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="">Photo *</label>
                <input type="file" name="photo" class="form-control">
                <?php if (!empty($rowEdit['photo'])){?>
                    <img src="<?php echo 'uploads/'.$rowEdit['photo'] ?>" alt="Photo" width="100px">
                <?php } ?>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" name="save">Save</button>
            </div>
        </form>
    </div>
</div>