<?php
    session_start();

    if(!isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }

    include '../koneksi.php';
    $query = "SELECT * FROM tempat_wisata;";
    $sql = mysqli_query($conn, $query);
    $no = 0;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Font awesome-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>Data User</title>
    </head>
    <body>
    <div class="container mt-2">
    <h1>Kelola Tempat Wisata</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Berisi data yang telah di simpan di database</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">- Create Read Update Delete</cite>
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3"><i class="fa fa-plus"></i>Tambah Data</a>
        <a href="logout.php" type="button" class="btn btn-danger mb-3"><i class="fa fa-plus"></i>Log Out</a>
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Nama Tempat</th>
                            <th>Foto</th>
                            <th>Alamat</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        while($result = mysqli_fetch_assoc($sql)){
                    ?>
                    <tr>
                        <td><center><?php echo ++$no;?></center></td>
                        <td> <?php echo $result['id'];?></td>
                        <td><?php echo $result['nama_tempat'];?></td>
                        <td><?php echo $result['foto_tempat'];?></td>
                        <td><?php echo $result['alamat_lokasi'];?></td>
                        <td><?php echo $result['keterangan'];?></td>
                        <td>
                            <form action="kelola.php?ubah=<?= $result['id'] ?>" class="form-inline" method="post">
                                <input type="hidden" value="<?= $result['nama_tempat'] ?>" name="nama_tempat">
                                <input type="hidden" value="<?= $result['foto_tempat'] ?>" name="foto_tempat">
                                <input type="hidden" value="<?= $result['alamat_lokasi'] ?>" name="alamat_lokasi">
                                <input type="hidden" value="<?= $result['keterangan'] ?>" name="keterangan">
                                <button class="btn btn-success btn-sm mb-1 " style="width:100px">Update</button>
                            </form>
                            <a href="proses.php?hapus=<?= $result['id'] ?>" type="button" style="width:100px"  class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        }
                        ?>
                    </tbody>
                </table>
                </div>
        </div>
    </div>
    </body>
</html>