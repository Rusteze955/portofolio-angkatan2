<?php
$query = mysqli_query($config, "SELECT * FROM services ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM services WHERE id='$id'");
    header("location:?page=service&hapus=berhasil");
}
?>
<div class="card-body">
    <div class="tabel-responsive">
        <div align="right" class="mb-3">
            <a href="?page=tambah-service" class="btn btn-primary">Tambah</a>
        </div>
        <table id="table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Icon</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($row as $key => $data):  ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $data['title'] ?></td>
                        <td><?= $data['icon'] ?></td>
                        <td><?= $data['description'] ?></td>
                        <td>
                            <a href="?page=tambah-service&edit=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a onclick="return confirm('Are you sure??')" href="?page=service&delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>