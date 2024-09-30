<?php
$conn = mysqli_connect("localhost", "root", "", "e_commerce");

function query($query){
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

function tambah($post) {
    global $conn;

    $nama = htmlspecialchars($post["namaGambar"]);
    $keterangan = htmlspecialchars($post["keterangan"]);

    $path = upload($_FILES['gambar']);

    if (!$path) {
        return false;
    }

    $queryTambah = "INSERT INTO gambar
                    VALUE ('', '$nama', '$keterangan', '$path')";

    mysqli_query($conn, $queryTambah);

    header('Location: ../admin/produk.php');
    exit;

    return mysqli_affected_rows($conn);
}

function upload($files){
    $namaGambar = $files["name"];
    $tmpName = $files["tmp_name"];
    $error = $files["error"];
    $size = $files["size"];

    $ekstensi = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', strtolower($namaGambar));
    $ekstensiGambar = end($ekstensiGambar);
    
    if (!in_array($ekstensiGambar, $ekstensi)){

        return false;
    }

    $namaGambarBaru = uniqid();
    $namaGambarBaru .= '.' . $ekstensiGambar;

    move_uploaded_file($tmpName, "../upload/$namaGambarBaru");

    return $namaGambarBaru;

}
?>