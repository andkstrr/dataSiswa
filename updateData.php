<?php
session_start();
if (isset($_POST['btn_update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $rayon = $_POST['rayon'];

    if (isset($_SESSION['data_siswa'][$id])) {
        $_SESSION['data_siswa'][$id] = [
            'nama' => $nama,
            'nis' => $nis,
            'rayon' => $rayon,
        ];
        header("Location: index.php");
        exit;
    } else {
        // Handle error: data not found
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
