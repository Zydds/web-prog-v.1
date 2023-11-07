<?php
require '../function.php';

$barang = query("SELECT * FROM barang");
$result = mysqli_query($conn,"SELECT * FROM barang");
//if( !$result) {
//echo mysqli_error($conn);
//}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data</title>
    <style>
        body {
        text-decoration: none !important;  
        font-family: Arial, sans-serif;
        background-image: url('../asset/bg.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your image file */
        background-size: cover; /* This ensures the image covers the entire viewport */
        background-repeat: no-repeat; /* Prevents the image from repeating */
        height: 100vh;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-top: 20px;
            background-color: #FFFFFF;
        }
        h1 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 36px;
            color: #FFFFFF; /* Change the text color */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Add a subtle text shadow */
            border-bottom: 2px solid #FFFFFF; 
            padding-bottom: 5px; 
        }
        a {
            text-decoration: none;
            margin border-right-width: 10px;
            text-align: left;
            background-color: #4caf50;
            margin-bottom: 5px;
            display: inline-block;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        a:hover {
            color: #0056b3; /* Change color on hover */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Daftar Barang Museum</h1>
    <a href="tambah.php">Tambah Barang Museum</a>
    <a href="../registrasi.php">Registrasikan Admin</a>
    <a href="../login.php" style="background-color:blue; margin-right: 10px; float: right;">Log out</a>
    

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No. </th>
            <th>Ubah</th>
            <th>Gambar</th>
            <th>Nama </th>
            <th>Deskripsi</th>
            <th>Ruangan</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach( $barang as $row ): ?>
        <tr>
            <td><?= $i; ?>.</td>
            <td>
                <a href="update.php?Id_barang=<?= $row["Id_barang"];?>">update</a>
                <a href="hapus.php?Id_barang=<?= $row["Id_barang"];?>" style="background-color:red;">hapus</a>
            </td>
            <td><img src="../img/<?= $row["gambar"];?>" width="100"></td>
            <td><?= $row["nama"];?></td>
            <td><?= $row["deskripsi"];?></td>
            <td><?= $row["ruangan"];?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>
</html>
