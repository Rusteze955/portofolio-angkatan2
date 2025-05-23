<?php
$query = mysqli_query($config, "SELECT * FROM abouts ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM abouts WHERE id='$id'");
    header("location:?page=tambah-profile&hapus=berhasil");
}
?>
<div class="card-body">
    <div class="tabel-responsive">
        <div align="right" class="mb-3">
            <a href="?page=tambah-profile" class="btn btn-primary">Tambah</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($row as $key => $data):  ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['status'] ?></td>
                        <td>
                            <a href="tambah-profile.php?edit=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a onclick="return confirm('Are you sure??')" href="user.php?delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>