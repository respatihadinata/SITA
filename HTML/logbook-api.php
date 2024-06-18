<?php
session_start();
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include 'connection.php';

$response = [];

if (isset($_SESSION['nim'], $_POST['tahapan'], $_POST['deskripsi'], $_POST['output'], $_POST['tanggalmulai'], $_POST['tanggalselesai'], $_POST['persentase'])) {
    $nim = $_SESSION['nim'];
    $tahapan = $_POST['tahapan'];
    $deskripsi = $_POST['deskripsi'];
    $output = $_POST['output'];
    $tanggalmulai = $_POST['tanggalmulai'];
    $tanggalselesai = $_POST['tanggalselesai'];
    $persentase = $_POST['persentase'];

    // Debugging statements
    error_log("NIM: $nim, Tahapan: $tahapan, Deskripsi: $deskripsi, Output: $output, Tanggal Mulai: $tanggalmulai, Tanggal Selesai: $tanggalselesai, Persentase: $persentase");

    // Check if NIM is set and not empty
    if (empty($nim)) {
        $response['success'] = false;
        $response['message'] = 'NIM is not set in the session.';
        echo json_encode($response);
        exit;
    }

    // Check database connection
    if ($koneksi->connect_error) {
        error_log("Database connection failed: " . $koneksi->connect_error);
        $response['success'] = false;
        $response['message'] = 'Database connection failed';
    } else {
        // Prepare and bind
        $stmt = $koneksi->prepare("INSERT INTO logbook (NIM, Tahapan, Deskripsi_Pengerjaan, Output_Pengerjaan, Tanggal_Mulai, Tanggal_Selesai, Kemajuan_Proposal) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $nim, $tahapan, $deskripsi, $output, $tanggalmulai, $tanggalselesai, $persentase);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Logbook entry added successfully';
        } else {
            error_log("Execute failed: " . $stmt->error);
            $response['success'] = false;
            $response['message'] = 'Failed to add logbook entry: ' . $stmt->error;
        }

        $stmt->close();
    }
} else {
    $response['success'] = false;
    $response['message'] = 'All fields are required';
}

$koneksi->close();
echo json_encode($response);
?>
