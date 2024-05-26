<?php
session_start();
if (isset($_POST['btn_update'])) {
    # Mengambil data baru dari form edit
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $rayon = $_POST['rayon'];

    if (isset($_SESSION['data_siswa'][$id])) {
        # Meng-update data siswa
        $_SESSION['data_siswa'][$id] = [
            'nama' => $nama,
            'nis' => $nis,
            'rayon' => $rayon,
        ];
        # Redirect jika proses update selesai -> index.php
        header("Location: index.php");
        exit;
    } else {
        # Handle error: data not found
        header("Location: index.php");
        exit;
    }
} else {
    # Jika form tidak update, redirect -> index.php
    header("Location: index.php");
    exit;
}
?>
