
<?php
// Siapkan variabel awal
$angka1  = "";
$angka2  = "";
$operasi = "+";
$hasil   = "";

// Jalankan hanya kalau tombol "Hitung" ditekan
if (isset($_POST['hitung'])) {
    $angka1  = $_POST['angka1'];
    $angka2  = $_POST['angka2'];
    $operasi = $_POST['operasi'];

    switch ($operasi) {
        case '+':
            $hasil = $angka1 + $angka2;
            break;
        case '-':
            $hasil = $angka1 - $angka2;
            break;
        case '*':
            $hasil = $angka1 * $angka2;
            break;
        case '/':
            if ($angka2 == 0) {
                $hasil = "Tidak bisa dibagi 0";
            } else {
                $hasil = $angka1 / $angka2;
            }
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="Kotak">
    <h1>Kalkulator Sederhana</h1>
    <form method="post">
        <input type="number" step="any" name="angka1" placeholder="Angka pertama"
               value="<?= htmlspecialchars($angka1) ?>" required>

        <select name="operasi">
            <option value="+" <?= $operasi == "+" ? "selected" : "" ?>>+ Tambah</option>
            <option value="-" <?= $operasi == "-" ? "selected" : "" ?>>- Kurang</option>
            <option value="*" <?= $operasi == "*" ? "selected" : "" ?>>x Kali</option>
            <option value="/" <?= $operasi == "/" ? "selected" : "" ?>>÷ Bagi</option>
        </select>

        <input type="number" step="any" name="angka2" placeholder="Angka kedua"
               value="<?= htmlspecialchars($angka2) ?>" required>

        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php if ($hasil !== ""): ?>
        <div class="hasil">
            Hasil: <strong><?= htmlspecialchars($hasil) ?></strong>
        </div>
    <?php endif; ?>
</div>
</body>
</html>