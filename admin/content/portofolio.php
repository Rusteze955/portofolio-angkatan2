<?php
$query = mysqli_query($config, "SELECT categories.name, portofolios.* FROM portofolios 
    LEFT JOIN categories ON categories.id = portofolios.id_category
    ORDER BY portofolios.id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $query = mysqli_query($config, "DELETE FROM portofolios WHERE id='$id'");
    header("location:?page=portofolio&hapus=berhasil");
}
?>

<div class="card-body">
    <div class="table-responsive">
        <div class="d-flex justify-content-end mb-3">
            <a href="?page=tambah-portofolio" class="btn btn-primary">+</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>photo</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- <?php $i = 1; ?> -->
                <?php foreach ($row as $key => $data): ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $data["name"]; ?></td>
                        <td><img src="../admin/uploads/<?php echo $data["photo"] ?>" alt="" width="100"></td>
                        <td><?php echo $data["name_porto"]; ?></td>
                        <td><?php echo $data["description"]; ?></td>
                        <td>
                            <a href="?page=tambah-portofolio&edit=<?php echo $data["id"]; ?>" class="btn btn-success btn-sm">Edit</a>
                            <a onclick="return confirm('Are you sure?')" href="?page=portofolio&delete=<?php echo $data["id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>