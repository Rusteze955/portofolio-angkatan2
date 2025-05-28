<?php
if ($_SESSION['LEVEL'] != 1) {
    echo "<h1>Anda tidak berhak kesini !! </h1>";
    echo "<a href='dashboard.php' class='btn btn-warning'>Kembali</a>";
    die;
    // header("location:dashboard.php?failed=access");
}
$query = mysqli_query($config, "SELECT * FROM resume ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM resume WHERE id='$id'");
    header("location:?page=resume&hapus=berhasil");
}
?>
<div class="card-body">
    <div class="tabel-responsive">
        <div align="right" class="mb-3">
            <a href="?page=tambah-resume" class="btn btn-primary">Tambah</a>
        </div>
        <table id="table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($row as $key => $data):  ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $data['name_1'] ?></td>
                        <td><?= $data['address'] ?></td>
                        <td><?= $data['contact'] ?></td>
                        <td>
                            <a href="?page=tambah-resume&edit=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a onclick="return confirm('Are you sure??')" href="?page=resume&delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>