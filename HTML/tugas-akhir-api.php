<?php
session_start();
header('Content-Type: application/json');

// Include the database connection file
include 'connection.php';

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['nim'])) {
        $nim = $_SESSION['nim'];
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $status = $_POST['status'];
        $dosen = $_POST['dosen'];

        // Mengunggah file
        $target_dir = "proposal-tugas-akhir/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $proposal = $target_file;
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Sorry, there was an error uploading your file.']);
            exit;
        }

        // Menyimpan data ke database
        $sql = "INSERT INTO TUGAS_AKHIR (NIM, Judul_TA, Deskripsi, Proposal_Tugas_Akhir, Status_Proposal, Dosen_Pembimbing) 
                VALUES ('$nim', '$judul', '$deskripsi', '$proposal', '$status', '$dosen')";
        
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['status' => 'success', 'message' => 'Record added successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error: ' . $sql . '<br>' . $conn->error]);
        }

        $conn->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    }
}
?>
