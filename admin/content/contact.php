<?php
$query = mysqli_query($config, "SELECT * FROM contacts ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM contacts WHERE id='$id'");
    header("location:user.php?hapus=berhasil");
}
?>
<div class="card-body">
    <div class="tabel-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($row as $key => $data):  ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $data['your_name'] ?></td>
                        <td><?= $data['your_email'] ?></td>
                        <td><?= $data['subject'] ?></td>
                        <td><?= $data['message'] ?></td>
                        <td>
                            <a href="?page=tambah-user&edit=<?php echo $data['id'] ?>&level=<?php echo base64_encode($_SESSION['LEVEL']) ?>" class="btn btn-success btn-sm">Edit</a>
                            <a onclick="return confirm('Are you sure??')" href="?user&delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>