<?php 
    if (isset($_POST["simpan"])) {
        $id_category = $_POST["id_category"];
        $photo = $_FILES["photo"]["name"];
        $tmp_name = $_FILES["photo"]["tmp_name"];
        $filename = uniqid() . "_" . basename($photo);
        $filepath = "uploads/" . $filename;
        unlink("uploads/" . $filename);
        move_uploaded_file($tmp_name, $filepath);
        $title = $_POST["title"];
        $description = $_POST["description"];

        $query = mysqli_query($config, "INSERT INTO portofolios(id_category, photo, title, description) VALUES('$id_category', '$filename', '$title', '$description')");
        if ($query) {
            header("location:?page=portofolio&tambah=berhasil");
        }
    }

    $tombol = isset($_GET["edit"]) ? "ubah" : "simpan";
    $id_user = isset($_GET["edit"]) ? $_GET["edit"] : "";
    $queryEdit = mysqli_query($config, "SELECT * FROM portofolio WHERE id='$id_user'");
    $rowEdit = mysqli_fetch_assoc($queryEdit);

    if (isset($_GET["edit"])) {
        $nilaiTitle = $rowEdit["title"];
        $nilaiDescription = $rowEdit["description"];
    } else {
        $nilaiTitle = "";
        $nilaiDescription = "";
    }

    if (isset($_POST["ubah"])) {
        $id_category = $_POST["id_category"];
        $photo = $_FILES["photo"]["name"];
        $tmp_name = $_FILES["photo"]["tmp_name"];
        $filename = uniqid() . "_" . basename($photo);
        $filepath = "uploads/" . $filename;
        unlink("uploads/" . $filename);
        move_uploaded_file($tmp_name, $filepath);
        $title = $_POST["title"];
        $description = $_POST["description"];

        $queryUpdate = mysqli_query($config, "UPDATE portofolios SET id_category='$id_category', photo='$filename', title='$title', description='$description' WHERE id='$id_user'");
        if ($queryUpdate) {
            header("location:?page=portofolio&ubah=berhasil");
        }
    }

    $queryCategory = mysqli_query($config, "SELECT * FROM category ORDER BY id DESC");
    $rowsCategory = mysqli_fetch_all($queryCategory, MYSQLI_ASSOC);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama Kategori</label>     
        </div>
        <div class="col-sm-10">
            <select required name="id_category" id="" class="form-control">
                <option value="">Pilih Category</option>
                <?php foreach ($rowsCategory as $key => $data) { ?>
                    <option <?php echo isset($_GET["edit"]) ? ($data["id"] == $rowEdit["id_category"]) ? 'selected': '' : ''; ?> value="<?php echo $data["id"]; ?>"><?php echo $data["name"]; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label class="form-label">Photo</label>       
        </div>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="photo" value="">
            <img src="uploads/<?php echo isset($rowEdit["photo"]) ? $rowEdit["photo"] : "" ?>" alt="" width="200">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Judul</label>
            
        </div>
        <div class="col-sm-10">
            <input required type="text" name="title" class="form-control" placeholder="Masukkan Judulnya" value="<?php echo $nilaiTitle; ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Deskripsi</label>
        </div>
        <div class="col-sm-10">
            <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $nilaiDescription; ?></textarea>
        </div>
    </div>
    <div class="mb-3 row" align="center">
        <div class="col-sm-12">
            <button name="<?php echo $tombol; ?>" type="submit" class="btn btn-primary"><?php echo $tombol; ?></button>
        </div>
    </div>
</form>