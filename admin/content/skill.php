<?php 
$query = mysqli_query($config, "SELECT * FROM skill ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM skill WHERE id='$id'");
    header("location:?page=skill&hapus=berhasil");
}
?>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <div class="mb-3" align="right">
                <a class="btn btn-primary" href="?page=tambah-skill">Add Skill</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row as $index => $skill) { ?>
                        <tr>
                            <td><?= $index +=1 ?></td>
                            <td><?= $skill ['name'] ?></td>
                            <td><?= $skill ['rating'] ?></td>
                            <td>
                                <a href="?page=tambah-skill&edit=<?php echo $skill['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="?page=skill&delete=<?php echo $skill['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>