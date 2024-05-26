<?php 
session_start();
$buttonPrint = null;
$buttonHapus = null;
$dataAwal = false;

if (isset($_POST['btn'])) {
    # Mengambil data pada form
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $rayon = $_POST['rayon'];

    if (isset($_SESSION['data_siswa'])) {
        foreach ($_SESSION['data_siswa'] as $data) {
            # Pengkondisian apabila ada nama dan nis yang sama
            if ($data['nama'] == $nama) { 
                $dataAwal = true;
                break;
            }
            if ($data['nis'] == $nis) { 
                $dataAwal = true;
                break;
            }
        }
    }

    if (!$dataAwal) {
        # Menambahkan data ke dalam form    
        $_SESSION['data_siswa'][] = [
            "nama" => $nama,
            "nis" => $nis,
            "rayon" => $rayon
        ];
        // Redirect untuk mencegah pengiriman ulang formulir
        // header("Location: ".$_SERVER['PHP_SELF']);
        // exit;
    }
}

if (isset($_SESSION['data_siswa']) && !empty($_SESSION['data_siswa'])) {
    # Menampilkan buttonPrint dan buttonHapus jika data berhasil ditambahkan
    $buttonPrint = '<a href="print.php" class="btn btn-success mt-3"><i class="fa-solid fa-print"></i> Cetak</a>';
    $buttonHapus = ' <a href="hapusAll.php" class="btn btn-danger mt-3"><i class="fa-solid fa-trash"></i> Hapus</a>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Siswa</title>
<!-- Link to Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Link to Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Masukan Data Siswa</h2>
    <form action="" method="POST" class="mb-4">
        <div class="row g-3">
            <div class="col-md-4">
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required>
            </div>
            <div class="col-md-4">
                <input type="number" name="nis" class="form-control" placeholder="Masukan NIS" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="rayon" class="form-control" placeholder="Masukan Rayon" required>
            </div>
        </div>
        <button type="submit" name="btn" class="btn btn-primary mt-3"><i class="fas fa-user-plus"></i> Tambah</button>
        <?= $buttonPrint; ?>
        <?= $buttonHapus; ?>
    </form>
        
    <!-- Memunculkan Alert -->
    <?php
    if (isset($_POST['btn'])) {
        if ($dataAwal) {
            # Alert apabila terdapat data yang sama
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data sudah ada!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            # Alert jika data berhasil ditambahkan
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
    ?>
        
    <table class="table table-bordered text-center">
        <thead class="thead-light">
            <tr>
                <th class="table-secondary">No</th>
                <th class="table-secondary">Nama</th>
                <th class="table-secondary">NIS</th>
                <th class="table-secondary">Rayon</th>
                <th class="table-secondary">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            if (isset($_SESSION['data_siswa']) && is_array($_SESSION['data_siswa']) && !empty($_SESSION['data_siswa'])) : 
                foreach($_SESSION["data_siswa"] as $key => $data) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <!-- Menampilkan data pada form -->
                        <td><?= htmlspecialchars($data['nama']); ?></td>
                        <td><?= htmlspecialchars($data['nis']); ?></td>
                        <td><?= htmlspecialchars($data['rayon']); ?></td>
                        <td>
                            <a href="hapusData.php?id=<?= $key; ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-delete-left"></i></a>
                            <a href="edit.php?id=<?= $key; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-user-pen"></i></a>
                        </td>
                    </tr>
                <?php endforeach; 
            else : ?>
                <tr>
                    <td colspan="5" style="color: red;">Tidak ada data</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Link to Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>