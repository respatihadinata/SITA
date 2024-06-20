<?php
ob_start(); // Start output buffering
session_start();
header('Content-Type: application/json');

// Include the database connection file
include 'connection.php';

$response = [];

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_SESSION['nim'])) {
            $nim = $_SESSION['nim'];
            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];
            $status = $_POST['status'];
            $dosen = $_POST['dosen'];

            // Find NIK by dosen name
            $stmt = $koneksi->prepare("SELECT NIK FROM daftar_dosen WHERE Nama = ?");
            $stmt->bind_param('s', $dosen);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($nik);
            $stmt->fetch();

            if ($stmt->num_rows > 0) {
                $stmt->close();

                // Mengunggah file
                $target_dir = "proposal-tugas-akhir/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    $proposal = $target_file;
                } else {
                    $response = ['status' => 'error', 'message' => 'Sorry, there was an error uploading your file.'];
                    echo json_encode($response);
                    ob_end_flush();
                    exit;
                }

                // Menyimpan data ke database menggunakan prepared statements
                $sql = "INSERT INTO TUGAS_AKHIR (NIM, Judul_TA, Deskripsi, Proposal_Tugas_Akhir, Status_Proposal, Dosen_Pembimbing) 
                        VALUES (?, ?, ?, ?, ?, ?)";
                
                $stmt = $koneksi->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param('ssssss', $nim, $judul, $deskripsi, $proposal, $status, $nik);

                    if ($stmt->execute()) {
                        $response = ['status' => 'success', 'message' => 'Record added successfully'];
                    } else {
                        $response = ['status' => 'error', 'message' => 'Error: ' . $stmt->error];
                    }

                    $stmt->close();
                } else {
                    $response = ['status' => 'error', 'message' => 'Error preparing statement: ' . $koneksi->error];
                }

                $koneksi->close();
            } else {
                $response = ['status' => 'error', 'message' => 'Dosen Pembimbing not found'];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'User not logged in'];
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Invalid request method'];
    }
} catch (Exception $e) {
    $response = ['status' => 'error', 'message' => 'Exception: ' . $e->getMessage()];
}

echo json_encode($response);
ob_end_flush(); // End output buffering and flush output
?>
