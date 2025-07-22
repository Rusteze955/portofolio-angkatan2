<?php 
$query = mysqli_query($config, "SELECT * FROM education ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM education WHERE id='$id'");
    header("location:?page=education&hapus=berhasil");
}
?>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <div class="mb-3" align="right">
                <a class="btn btn-primary" href="?page=tambah-education">Add Education</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row as $index => $education) { ?>
                        <tr>
                            <td><?= $index +=1 ?></td>
                            <td><?= $education ['name'] ?></td>
                            <td><?= $education ['description'] ?></td>
                            <td>
                                <a href="?page=tambah-education&edit=<?php echo $education['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="?page=education&delete=<?php echo $education['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>