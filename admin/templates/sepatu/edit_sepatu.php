<div class="page-header">
    <h1>Tambah Sepatu</h1>
    <small>Dashboard / Tambah Sepatu</small>
</div>

<div class="page-content">
    <div class="analytics">
        <div class="card">
            <div class="card-head">
                <h2>107,200</h2>
                <span class="las la-user-friends"></span>
            </div>
            <div class="card-progress">
                <small>User activity this month</small>
                <div class="card-indicator">
                    <div class="indicator one" style="width: 60%"></div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-head">
                <h2>340,230</h2>
                <span class="las la-eye"></span>
            </div>
            <div class="card-progress">
                <small>Page views</small>
                <div class="card-indicator">
                    <div class="indicator two" style="width: 80%"></div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-head">
                <h2>$653,200</h2>
                <span class="las la-shopping-cart"></span>
            </div>
            <div class="card-progress">
                <small>Monthly revenue growth</small>
                <div class="card-indicator">
                    <div class="indicator three" style="width: 65%"></div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-head">
                <h2>47,500</h2>
                <span class="las la-envelope"></span>
            </div>
            <div class="card-progress">
                <small>New E-mails received</small>
                <div class="card-indicator">
                    <div class="indicator four" style="width: 90%"></div>
                </div>
            </div>
        </div>

        <div class="records table-responsive">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2>Lembar Edit Data Sepatu</h2>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php
                include 'config.php';
                if (isset($_GET['id'])) {
                    if ($_GET['id'] != "") {
                        $id = $_GET['id'];

                        $query = mysqli_query($conn, "SELECT * FROM sepatu WHERE id='$id'");
                        if (!$query) {
                            die("Query Error: " . mysqli_errno($conn) .
                                " - " . mysqli_error($conn));
                        }

                        $row = mysqli_fetch_assoc($query);
                        if (!count($row)) {
                            echo "<script>alert('Data tidak ditemukan pada database');windows.location='index.php;'</script>";
                        }
                    } else {
                        echo "<script>alert('Data tidak ditemukan pada database');windows.location='index.php;'</script>";
                    }
                }
                ?>

                <form role="form" action="templates/sepatu/proses_edit_sepatu.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Barang" name="nama" value="<?php echo $row['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Jenis</label>
                            <input type="text" class="form-control" placeholder="Masukkan Jenis Barang" name="jenis" value="<?php echo $row['jenis']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input class="form-control" type="number" name="harga" value="<?php echo $row['harga']; ?>"></input>
                        </div>
                        <div class="form-group">
                            <label>Foto Barang</label>
                            <input class="text" type="file" name="foto" required="required" value="<?php echo $row['foto']; ?>"></input>
                            <p style="color: red">Ekstensi yang diperlolehkan .png | .jpg | .jpeg</p>
                            <?php
                            if ($row['foto'] == "") { ?>
                                <img src="https://via.placeholder.com/500x500.png?text=LAMPIRAN+FOTO+BARANG" style="width:100px;height:100px;">
                            <?php } else { ?>
                                <img src="./templates/sepatu/file/<?php echo $row['foto']; ?>" style="width:100px;height:100px;">
                            <?php } ?>

                        </div>
                        <div class="form-group">
                            <label>Lama Pembuatan</label>
                            <input class="form-control" placeholder="Masukkan Lama Pembuatan" type="number" name="lama_buat" value="<?php echo $row['lama_buat']; ?>"></input>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>