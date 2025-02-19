<div class="page-header">
    <h1>Baju</h1>
    <small>Dashboard / Baju</small>
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
    </div>

    <div class="records table-responsive">
        <div class="record-header">
            <div class="add">
                <span>Entries</span>
                <select name="" id="">
                    <option value="">ID</option>
                </select>
                <a href="./index.php?hal=tambah_baju">
                    <button>Tambah Produk</button>
                </a>
            </div>

            <div class="browse">
                <input
                    type="search"
                    placeholder="Search"
                    class="record-search" />
                <select name="" id="">
                    <option value="">Status</option>
                </select>
            </div>
        </div>

        <div>
            <table width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><span class="las la-sort"></span> Nama</th>
                        <th><span class="las la-sort"></span> Jenis</th>
                        <th><span class="las la-sort"></span> Harga</th>
                        <th><span class="las la-sort"></span> Foto Barang</th>
                        <th><span class="las la-sort"></span> Lama Pembuatan</th>
                        <th><span class="las la-sort"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "config.php";
                    $hasil = mysqli_query($conn, "select * from baju_rajut");
                    $no = 1;
                    while ($row = mysqli_fetch_array($hasil)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                                <div class="client">
                                    <div class="client-info">
                                        <h4><?php echo $row['nama'] ?>
                                        </h4>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $row['jenis'] ?></td>
                            <td><?php echo $row['harga'] ?></td>
                            <td><?php
                                if ($row['foto'] == "") { ?>
                                    <img src="https://via.placeholder.com/500x500.png?text=FOTO+BARANG" style="width:100px;height:100px;">
                                <?php } else { ?>
                                    <img src="./templates/baju/file/<?php echo $row['foto']; ?>" style="width:100px;height:100px;">
                                <?php } ?>
                            </td>
                            <td><?php echo $row['lama_buat'] ?></td>
                            <td>
                                <a href="index.php?hal=edit_baju&id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-warning" name=""> <i class="fa fa-pencil"></i> Edit</button></a>
                                <button><a onclick="return confirm('Anda Yakin...?')" href="./templates/baju/hapus_baju.php?id=<?php echo $row['id'] ?>">
                                        <!-- <button type="button" name="">Hapus</button> -->
                                        Hapus</a></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>