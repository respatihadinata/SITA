<?php
session_start();
header('Content-Type: application/json');

// Include the database connection file
include 'connection.php';

$response = [];

if (isset($_POST['nim']) && isset($_POST['password'])) {
    $nim = $_POST['nim'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $koneksi->prepare("SELECT NIM, Nama FROM MAHASISWA WHERE NIM = ? AND password = ?");
    $stmt->bind_param("ss", $nim, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($nim, $nama);
        $stmt->fetch();
        $_SESSION['nim'] = $nim;
        $_SESSION['nama'] = $nama;
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['message'] = 'Invalid NIM or password';
    }

    $stmt->close();
} else {
    $response['success'] = false;
    $response['message'] = 'NIM and password are required';
}

$koneksi->close();
echo json_encode($response);
?>
