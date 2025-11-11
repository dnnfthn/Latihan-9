<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Upload File PDF</title>
</head>
<body>
  <h2>Upload File PDF</h2>
  <form action="upload_action.php" method="POST" enctype="multipart/form-data">
    <label for="file">Pilih File (PDF saja, max 10 MB):</label><br><br>
    <input type="file" name="file" accept="application/pdf" required><br><br>
    <button type="submit" name="submit">Upload</button>
  </form>
</body>
</html>