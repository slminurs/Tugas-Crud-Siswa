<?php
include("config.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['aksi'])){
    // ambil data dari formulir
    if($_POST['aksi']=='add'){
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $kodepos = $_POST['kode_pos'];
    $notel = $_POST['no_telepon'];
    $email = $_POST['email'];
    $sekolah= $_POST['sekolah_asal'];
    $jurusan= $_POST['pilihan_jurusan1'];
    //format tanggal sesuai dengan format mysql (YYYY-MM-DD)
    $tanggal_mysql = date("y-m-d", strtotime($tanggal));
    // buat query
    $sql = "INSERT INTO pendaftaran (nama, alamat, jenis_kelamin, agama, sekolah_asal, no_telepon, email, pilihan_jurusan1, desa, kecamatan, kota, provinsi, kode_pos) 
    VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah','$notel','$email', '$jurusan', '$desa', '$kecamatan', '$kota','$provinsi', '$kodepos')";
    $query = mysqli_query($db, $sql);
    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }
} else if($_POST['aksi']=='edit'){
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $kodepos = $_POST['kode_pos'];
    $notel = $_POST['no_telepon'];
    $email = $_POST['email'];
    $sekolah= $_POST['sekolah_asal'];
    $jurusan= $_POST['pilihan_jurusan1'];
    $tanggal_mysql = date("y-m-d", strtotime($tanggal));
    $sql = "UPDATE pendaftaran SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah', tanggal_lahir='$tanggal',
    no_telepon='$notel', email='$email', pilihan_jurusan1='$jurusan', desa='$desa', kecamatan='$kecamatan', kota='$kota', provinsi='$provinsi', kode_pos='$kodepos'
    WHERE id_pendaftaran='$id_pendaftaran'";
    $query = mysqli_query($db, $sql);
    //apakah query hapus berhasil?
    if ($query){
        header('Location: index.php?status=sukses');
    }else{
        header('Location: index.php?status=gagal');
    }
}
}
if(isset($_GET['hapus'])){
    //ambil query dari Query string
    $id_pendaftaran = $_GET['hapus'];

    //buat query hapus
    $sql = "DELETE FROM pendaftaran WHERE id_pendaftaran='$id_pendaftaran';";
    $query = mysqli_query($db, $sql);

    //apakah query hapus berhasil?
    if($query){
        header('Location: index.php?status=sukses');
    }else {
        header('Location: index.php?status=gagal');
    }
}
?>