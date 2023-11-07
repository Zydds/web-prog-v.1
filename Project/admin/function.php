<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "museum"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
function tambah($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $ruangan = htmlspecialchars($data["ruangan"]);

    $gambar = upload();
    if( !$gambar) {
        return false;
    }
    $query = "INSERT INTO barang
    VALUES ('', '$gambar','$nama','$deskripsi','$ruangan')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>
<?php
function upload() {
    $namafile = $_FILES["gambar"]["name"];
    $ukuranfile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpname = $_FILES["gambar"]["tmp_name"];

    if( $error === 4) {
        echo "<script>
                alert('gambar belum dipilih');
        </script>";
        return false;
    }

    $ekstensigambarvalid = ['jpg', 'png', 'jpeg'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if ( !in_array($ekstensigambar, $ekstensigambarvalid)){
        echo "<script>
                alert('upload gambar pak jangan yang lain');
        </script>";
        return false;
    }

    if ($ukuranfile > 10000000) {
        echo "<script>
                alert('file gambar terlalu besar');
        </script>";
        return false;
    }

    move_uploaded_file($tmpname, '../img/'. $namafile);
    return $namafile;
}
?>

<?php
function hapus($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM barang WHERE id_barang = $id");

    return mysqli_affected_rows($conn);
}
?>
<?php
function update($data) {
    global $conn;

    $id = $data["Id_barang"];

    $query_sebelumnya = "SELECT * FROM barang WHERE Id_barang = $id";
    $result_sebelumnya = mysqli_query($conn, $query_sebelumnya);
    $data_sebelumnya = mysqli_fetch_assoc($result_sebelumnya);
    
    $gambar_sebelumnya = $data_sebelumnya["gambar"];

    echo "Riwayat Gambar Sebelumnya:$gambar_sebelumnya<br>";

    $gambar = $gambar_sebelumnya;

    if ($_FILES['gambar']['error'] != UPLOAD_ERR_NO_FILE) {
        $gambar = upload(); // Jika ada, gunakan gambar baru
    
    }
    $nama = htmlspecialchars($data["nama"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $ruangan = htmlspecialchars($data["ruangan"]);


    $query = "UPDATE barang SET
    gambar = '$gambar',
    nama = '$nama',
    deskripsi = '$deskripsi',
    ruangan = '$ruangan'

    WHERE Id_barang = $id
    ";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}
?>
<?php
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
?>
<?php
function registrasi ($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn,"SELECT username FROM admin WHERE username = '$username'");
    if( mysqli_fetch_assoc($result)) {
        echo "
            <script>
            alert('username sudah terpakai')
            </script>";

            return false;
    }

    if( $password !== $password2 ) {
        echo "<script>
            alert('konfirmasi password salah');
        </script>";
        return false;
    
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO admin VALUES ('', '$username', '$password') ");
    return mysqli_affected_rows($conn);

}
?>