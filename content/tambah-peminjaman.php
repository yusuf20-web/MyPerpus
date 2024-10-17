<?php
if (isset($_POST['simpan'])) {
    $no_pinjaman = $_POST['no_pinjaman'];
    $id_anggota    = $_POST['id_anggota'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $id_buku  = $_POST['id_buku'];
    // select, insert, update, delete
    $insert = mysqli_query($koneksi, "INSERT INTO peminjaman (no_pinjaman,
    id_anggota, tanggal_pinjam, tanggal_pengembalian) VALUES 
    ('$no_pinjaman','$id_anggota','$tanggal_pinjam','$tanggal_pengembalian')");
    $id_peminjaman = mysqli_insert_id($koneksi);
    foreach ($id_buku as $key => $buku){
        $id_buku = $_POST['id_buku'][$key];
        $insertDetail = mysqli_query($koneksi,"INSERT INTO detail_peminjaman(id_pinjaman, id_buku) VALUES ('$id_pinjaman,'$id_buku')");
    }
    header("location:?pg=peminjaman&tambah=berhasil");
}

$id = isset($_GET['detail']) ? $_GET['detail'] : '';
$queryPeminjam = mysqli_query($koneksi, "SELECT anggota.nama_anggota, peminjaman.* FROM peminjaman LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota WHERE peminjaman.id = '$id'"
);
$rowPeminjam = mysqli_fetch_assoc($queryPeminjam);


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

$queryKodePnjm = mysqli_query($koneksi,"SELECT MAX(id) as id_pinjam FROM peminjaman");
$rowPeminjaman = mysqli_fetch_assoc($queryKodePnjm);
$id_pinjam = $rowPeminjaman["id_pinjam"];
$id_pinjam++;

$kode_pinjam = "PJM/" .date('dmy') . "/" . sprintf('%03s', $id_pinjam);
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border border-black border-2 p-3">
                <legend class="float-none w-auto px-3"><?php echo isset($_GET['detail']) ? 'Detail' : 'Tambah' ?> Buku</legend>
                <form action="" method="post">
                    <div class="mb-3 row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Nomor Peminjaman</label>
                                <input type="text" class="form-control" name="no_pinjaman" value="<?php echo isset($_GET['detail']) ? $rowPeminjam['no_pinjaman'] :  $kode_pinjam ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Pinjam</label>
                                <input required type="date" class="form-control" name="tanggal_pinjam" value="<?php echo isset($_GET['detail']) ? $rowPeminjam['tanggal_pinjam'] : '' ?>" readonly>
                            </div>

                            <?php if(empty($_GET['detail'])) : ?>
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Buku</label>
                                <select required name="id_buku" id="id_buku" class="form-control">
                                    <option value="">Pilih Buku</option>
                                    <!-- AMBIL DATA BUKU DARI TABLE BUKU -->
                                     <?php while ($rowBuku = mysqli_fetch_assoc($queryBuku)): ?>
                                     <option value="<?php echo $rowBuku['id']?>">
                                        <?php echo $rowBuku['nama_buku']; ?>
                                     </option>
                                     <?php endwhile; ?>
                                </select>
                            </div>
                            <?php endif ?>
                        </div>
                        <div class="col-sm-4">
                        <div class="mb-3">
                                <label for="" class="form-label">Nama Anggota</label>
                                <?php if(!isset($_GET['detail'])): ?>
                                <select required name="id_anggota" id="" class="form-control">
                                    <option value="">Pilih Anggota</option>
                                    <!-- NGAMBIL DATA ANGGOTA DARI TABEL ANGGOTA -->
                                     <?php while ($rowAnggota = mysqli_fetch_assoc($queryAnggota)): ?>
                                     <option value="<?php echo $rowAnggota['id']?>">
                                        <?php echo $rowAnggota['nama_anggota']; ?>
                                     </option>
                                     <?php endwhile; ?>
                                </select>
                                <?php else: ?>
                                     <input type="text" class="form-control" readonly value="<?php echo $rowPeminjam['nama_anggota'] ?>">
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Pengembalian</label>
                                <input required type="date" class="form-control" name="tanggal_pengembalian" value="<?php echo isset($_GET['detail']) ? $rowPeminjam['tanggal_pengembalian'] : '' ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <?php if(empty($_GET['detail'])) : ?>
                    <div align="right" class="mb-3">
                        <button type="button" id="add-row" class="btn btn-primary">Tambah</button>
                    </div>
                    <?php endif ?>
                    <!-- Table data dari query dengan php -->
                    <?php if (!empty($_GET['detail'])) : ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Naman Buku</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <!-- Table data dari JS -->
                        <table class="table table-bordered" id="table" >
                            <thead>
                                <tr>
                                    <th>Nomor Peminjaman</th>
                                    <th>Nama Buku</th>
                                    <th>Nama Anggota</th>
                                    <th>Tanggal Pinjam Buku</th>
                                    <th>tanggal Pengembalian Buku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-row"></tbody>
                        </table>
                        <div class="mt-3">
                            <button type="submit" name="simpan" class="btn btn-primary me-3">Simpan</button>
                            <a href="?pg=peminjaman" class="btn btn-secondary">Kembali</a>
                            <?php if(isset($_GET['ubah'])):?>
                                <a href="?pg=peminjaman&delete=<?php echo $id?>" class="btn btn-danger">Hapus</a>
                            <?php endif;?> 
                        </div>
                    <?php endif ?>
                </form>
            </fieldset>
        </div>
    </div>
</div>