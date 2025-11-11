<?php
include "db.php";

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $filename = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // Validasi ekstensi PDF
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    if ($file_ext !== 'pdf') {
        die("Gagal: File harus bertipe PDF.");
    }

    // Validasi ukuran maksimal 10 MB (10 * 1024 * 1024 bytes)
    if ($file_size > 10 * 1024 * 1024) {
        die("Gagal: Ukuran file melebihi 10 MB.");
    }

    if ($file_error === 0) {
        // Buat nama file baru: your_name_epochtime_real_filename.pdf
        $your_name = "Danen";
        $new_name = $your_name . "_" . time() . "_" . $filename;
        $destination = "uploads/" . $new_name;

        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($file_tmp, $destination)) {
            // Simpan path ke database
            $sql = "INSERT INTO uploads (path, name) VALUES ('$destination', '$filename')";
            if (mysqli_query($conn, $sql)) {
                echo "File berhasil diupload!<br>";
                echo "Path tersimpan: <b>$destination</b>";
            } else {
                echo "Gagal menyimpan ke database: " . mysqli_error($conn);
            }
        } else {
            echo "Gagal memindahkan file.";
        }
    } else {
        echo "Terjadi kesalahan saat upload.";
    }
} else {
    echo "Tidak ada file yang diupload.";
}
?>
