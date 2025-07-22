<?php
    $queryPorto = mysqli_query($config, "SELECT * FROM portofolios ORDER BY id DESC");
    $rowEdit = mysqli_fetch_assoc($queryPorto);

if (isset($_GET['edit'])){
    $queryPorto = mysqli_query($config, "SELECT * FROM portofolios ORDER BY id DESC");
    $rowEdit = mysqli_fetch_assoc($queryPorto);
    $id = $rowEdit['id'];
    
    if (isset($_POST['save'])){
        $name = $_POST['name_porto'];
        $description = $_POST['description'];
        $photo = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $fileName = uniqid() . "_" . basename($photo);
        $filePath = "uploads/" . $fileName;

        if(!empty($photo)){
            if(!empty($rowEdit['photo'])){
                unlink("uploads/" . $rowEdit['photo']);
            }
            move_uploaded_file($tmp_name, $filePath);
            
            $update = mysqli_query($config, "UPDATE portofolios SET name_porto='$name', description='$description', photo='$fileName' WHERE id='$id'");
            
        }else{
            $update = mysqli_query($config, "UPDATE portofolios SET name_porto='$name', description='$description' WHERE id='$id'");
        }
        header("location:?page=portofolio&edit=berhasil");
    }   
}else{
    if (isset($_POST['save'])){
        $name = $_POST['name_porto'];
        $description = $_POST['description'];
        $photo = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $fileName = uniqid() . "_" . basename($photo);
        $filePath = "uploads/" . $fileName;

        if(!empty($photo)){
            move_uploaded_file($tmp_name, $filePath);
            
            $insert = mysqli_query($config, "INSERT INTO portofolios (name_porto, description, photo) VALUES ('$name', '$description', '$fileName')");
            
        }else{
            $insert = mysqli_query($config, "INSERT INTO portofolios (name_porto, description) VALUES ('$name', '$description')");
        }
        header("location:?page=portofolio&tambah=berhasil");
    }
}

?>
<div class="row">
    <div class="col-sm-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="">Nama *</label>
                <input type="text" name="name_porto" class="form-control" value="<?= isset($_GET['edit']) ? $rowEdit['name_porto'] : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="">Description *</label>
                <input type="text" name="description" class="form-control" value="<?= isset($_GET['edit']) ? $rowEdit['description'] : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="">Photo </label>
                <input type="file" name="photo" class="form-control">
                <?php if (isset($_GET['edit']) && !empty($rowEdit['photo'])){?>
                    <img src="<?php echo 'uploads/'.$rowEdit['photo'] ?>" alt="Photo" width="100px">
                <?php } ?>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" name="save">Save</button>
            </div>
        </form>
    </div>
</div>