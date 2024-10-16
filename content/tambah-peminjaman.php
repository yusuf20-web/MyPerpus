<?php
if (isset($_POST['tambah'])) {
    $nama            = $_POST['nama_buku'];
    $penerbit        = $_POST['penerbit'];
    $tahun           = $_POST['tahun_terbit'];
    $pengarang       = $_POST['pengarang'];
    $id_kategori        = $_POST['id_kategori'];
    // select, insert, update, delete
    $insert = mysqli_query($koneksi, "INSERT INTO buku 
    (id_kategori, nama_buku, penerbit, tahun_terbit, pengarang) VALUES 
    ('$id_kategori','$nama','$penerbit','$tahun','$pengarang')");
    header("location:?pg=buku&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editBuku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id = '$id'"
);
$rowEdit = mysqli_fetch_assoc($editBuku);

if (isset($_POST['edit'])) {
    $nama            = $_POST['nama_buku'];
    $penerbit        = $_POST['penerbit'];
    $tahun           = $_POST['tahun_terbit'];
    $pengarang       = $_POST['pengarang'];
    $id_kategori      = $_POST['id_kategori'];
    // ubah buku kolom apa yang mau di ubah (SET), yang mau di ubah id ke berapa
    $update = mysqli_query($koneksi, "UPDATE buku SET id_kategori='$id_kategori', nama_buku='$nama', penerbit='$penerbit', tahun_terbit='$tahun', pengarang='$pengarang' WHERE id='$id'");
    header("location:?pg=buku&ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM buku WHERE id='$id'");
    header("location:?pg=buku&hapus=berhasil");
}

$queryBuku = mysqli_query($koneksi,"SELECT * FROM buku");

$queryAnggota = mysqli_query($koneksi,"SELECT * FROM anggota");

?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border border-black border-2 p-3">
                <legend class="float-none w-auto px-3"><?php echo nameOfPage() ?> Peminjaman</legend>
                <form action="" method="post">
                    <div class="mb-3 row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Nomor Peminjaman</label>
                                <input type="text" class="form-control" name="no_pinjaman" value="" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Pinjam</label>
                                <input type="date" class="form-control" name="tanggal_pinjam" value="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Buku</label>
                                <select name="" id="id_buku" class="form-control">
                                    <option value="">Pilih Buku</option>
                                    <!-- AMBIL DATA BUKU DARI TABLE BUKU -->
                                     <?php while ($rowBuku = mysqli_fetch_assoc($queryBuku)): ?>
                                     <option value="<?php echo $rowBuku['id']?>">
                                        <?php echo $rowBuku['nama_buku']; ?>
                                     </option>
                                     <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        <div class="mb-3">
                                <label for="" class="form-label">Nama Anggota</label>
                                <select name="id_anggota" id="" class="form-control">
                                    <option value="">Pilih Anggota</option>
                                    <!-- NGAMBIL DATA ANGGOTA DARI TABEL ANGGOTA -->
                                     <?php while ($rowAnggota = mysqli_fetch_assoc($queryAnggota)): ?>
                                     <option value="<?php echo $rowAnggota['id']?>">
                                        <?php echo $rowAnggota['nama_anggota']; ?>
                                     </option>
                                     <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Pengembalian</label>
                                <input type="date" class="form-control" name="tanggal_pengembalian" value="">
                            </div>
                        </div>
                    </div>
                    <div align="right" class="mb-3">
                        <button type="button" id="add-row" class="btn btn-primary">Tambah</button>
                    </div>
                    <table class="table table-bordered" id="table" >
                        <thead>
                            <tr>
                                <th>Nama Buku</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-row"></tbody>
                    </table>
                </form>
            </fieldset>
        </div>
    </div>
</div>