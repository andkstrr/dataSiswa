<?php 
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $detail = null;
    if (isset($_SESSION['data_siswa'][$id])) {
        $detail = $_SESSION['data_siswa'][$id];
    }

    if ($detail == null) {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Data Siswa</title>
<!-- Link to Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Data Siswa</h2>
    <form action="updateData.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <div class="row g-3">
            <div class="col-md-4">
                <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($detail['nama']); ?>" required>
            </div>
            <div class="col-md-4">
                <input type="number" name="nis" class="form-control" value="<?= htmlspecialchars($detail['nis']); ?>" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="rayon" class="form-control" value="<?= htmlspecialchars($detail['rayon']); ?>" required>
            </div>
        </div>
        <button type="submit" name="btn_update" class="btn btn-primary mt-3"><i class="fas fa-edit"></i> Edit</button>
        <a href="index.php" class="btn btn-danger mt-3"><i class="fas fa-times"></i> Batal</a>
    </form>
</div>

<!-- Link to Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<!-- Link to Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-uvdLXBeEKK6B8MyT9VFYBfl7tv50zqNYZj1Isw0ynqDah+jcGgWb8FNfuOx1P0/O+eaaFf2Yy9HOHq3W5IIdg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
