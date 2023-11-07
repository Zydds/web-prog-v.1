<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection</title>
    <!--<link rel="stylesheet" href="styles.css">---->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
    <style>
        * {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}

h1 {
    color: #ffffff;
    text-align: center;
    text-shadow: 2px 2px rgba(4,9,30,0.7);
}

body {

    background-image: url('asset1/trex.jpg'); /* Replace with your image URL */
    background-size: cover;
    background-position: center;
    background-attachment: fixed; /* Optional: keeps the background fixed while scrolling */
    backdrop-filter:blur(3px)
}

.header {
    min-height: 70px;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.7); /* Black with 70% opacity */
    position: relative;  
    border-bottom: 2px solid #ffffff;
}

nav {
    display: flex;
    padding: 2% 6%;
    justify-content: space-between;
    align-items: center;
}

nav img {
    width: 200px;
}

.nav-links {
    flex: 1;
    text-align: right;
}

.nav-links ul li {
    list-style: none;
    display: inline-block;
    padding: 8px 12px;
    position: relative;
}

.nav-links ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 13px;
}

.nav-links ul li::after {
    content: '';
    width: 0%;
    height: 2px;
    background: #F97A5F;
    display: block;
    margin: auto;
    transition: 0.5s;
}

.nav-links ul li:hover::after{
    width: 100%;
}

.table-container {
    background-color: #000000;
    
}

table {
    margin-top: 10px;
    border: 2px solid #000000;
    border-radius: 5px;
    width: 95%;
    margin: 0 auto;
    color: #000000;
    font-size: 16px;
    text-align: left;
    border-collapse: collapse;
    background-color: #f4f3f4;
}

th, td {
    border: 1px solid #000000; /* Add borders to cells */
    padding: 10px; /* Add padding for better spacing */
}   

th {
    text-align: center;
    background-color: #777;
    color: #ffffff;
}

tr:nth-child(even) {
    background-color: f8f8f8;
}

    </style>
</head>
<body>
<section class="header" id="header">
        <nav>
            <a href="index.html"><img src="asset1/geov1.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="index.html">COLLECTION</a></li>
                    <li><a href="index.html">HISTORY</a></li>
                    <li><a href="index.html">COLLABORATION</a></li>
                    <li><a href="index.html">CONTACT</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    </section>
    <br>
    <h1>-Barang Koleksi Museum Geo Bandung-</h1>
    <br>
    <table>
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Ruangan</th>
        </tr>
        <?php $i = 1; ?>
        <?php

        require "../admin/function.php";

        $conn = mysqli_connect("localhost","root","","museum");
        if($conn->connect_error) {
            die("Connection failed:". $conn->connect_error);
        }

        $sql = "SELECT Id_barang, gambar, nama, deskripsi, ruangan FROM barang";
        $result = $conn-> query($sql);

        if ($result -> num_rows > 0) {
            while($row = $result -> fetch_assoc()) {
                echo "<tr><td>" .$i++,".". "</td><td><img src='../admin/img/" . $row["gambar"] . "' width='100'></td><td>" . $row["nama"] . "</td><td>" . $row["deskripsi"] . "</td><td>" . $row["ruangan"] . "</td></tr>";
        }
        echo "</table>";
        }
        else {
            echo "0 result";
        }

        $conn-> close();
        ?>     
    </table>

    
</body>
</html>