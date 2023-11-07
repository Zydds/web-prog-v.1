<?php
require "../function.php";

if(isset($_POST["submit"]) ) {


    if(tambah($_POST) > 0) {
        echo "<script> 

            alert('data berhasil ditambah');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "gagal di tambah!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        background-image: url('../asset/bg.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your image file */
        background-size: cover; /* This ensures the image covers the entire viewport */
        background-repeat: no-repeat; /* Prevents the image from repeating */
        height: 100vh;
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

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 2px;
        }

        input[type="text"], input[type="password"] {
            width: 94%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button, a {
            font-size: 13px;
            background-color: #4caf50;
            display: inline-block;
            margin: auto;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        p.error-message {
            color: red;
            font-style: italic;
            text-align: center;
        }
        img {
            display: block;
            margin:auto;
            height: 150px;
            weight: 300px;
        }
    </style>
</head>
<body>
    <h1>Tambah Barang Museum</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="deskripsi">Deskripsi: </label>
                <input type="text" name="deskripsi" id="deskripsi" required>
            </li>
            <li>
                <label for="ruangan">Ruangan: </label>
                <input type="text" name="ruangan" id="ruangan" required>
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah!</button>
            </li>
            <li>
                <a href="index.php">Kembali</a>
            </li>
        </ul>

    </form>
</body>
</html>