<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Siswa</title>
<!-- Link to Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Data Siswa</h1>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th class="table-secondary">No</th>
                <th class="table-secondary">Nama</th>
                <th class="table-secondary">NIS</th>
                <th class="table-secondary">Rayon</th>
            </tr>
        </thead>
    <tbody>
            <?php 
            $i = 1;
            if (isset($_SESSION['data_siswa']) && is_array($_SESSION['data_siswa'])) :
                foreach($_SESSION["data_siswa"] as $key => $data) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= htmlspecialchars($data['nama']); ?></td>
                        <td><?= htmlspecialchars($data['nis']); ?></td>
                        <td><?= htmlspecialchars($data['rayon']); ?></td>
                    </tr>
                <?php endforeach;
            endif; ?>
        </tbody>
    </table>
    <script>
        window.onload = function () {
            window.print();
        }
    </script>
    <div class="text">
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </div>
</div>

<!-- Link to Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
