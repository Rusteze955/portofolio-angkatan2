<?php 
$query = mysqli_query($config, "SELECT * FROM sumary ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM sumary WHERE id='$id'");
    header("location:?page=sumary&hapus=berhasil");
}
?>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <div class="mb-3" align="right">
                <a class="btn btn-primary" href="?page=tambah-sumary">Add Sumary</a>
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
                    <?php foreach ($row as $index => $sumary) { ?>
                        <tr>
                            <td><?= $index +=1 ?></td>
                            <td><?= $sumary ['name'] ?></td>
                            <td><?= $sumary ['description'] ?></td>
                            <td>
                                <a href="?page=tambah-sumary&edit=<?php echo $sumary['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="?page=sumary&delete=<?php echo $sumary['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>