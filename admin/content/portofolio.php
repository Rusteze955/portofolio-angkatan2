<?php 
$query = mysqli_query($config, "SELECT * FROM portofolios ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM portofolios WHERE id='$id'");
    header("location:?page=portofolio&hapus=berhasil");
}
?>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <div class="mb-3" align="right">
                <a class="btn btn-primary" href="?page=tambah-portofolio">Add Portofolio</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row as $index => $porto) { ?>
                        <tr>
                            <td><?= $index +=1 ?></td>
                            <td><?= $porto ['name_porto'] ?></td>
                            <td><?= $porto ['description'] ?></td>
                            <td><img src="uploads/<?= $porto ['photo'] ?>" alt="" width="100px"></td>
                            <td>
                                <a href="?page=tambah-portofolio&edit=<?php echo $porto['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="?page=portofolio&delete=<?php echo $porto['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>