<?php
session_start();
header('Content-Type: application/json');

$response = array();
if (isset($_SESSION['nama']) && isset($_SESSION['nim'])) {
    $response['success'] = true;
    $response['nama'] = $_SESSION['nama'];
    $response['nim'] = $_SESSION['nim'];
} else {
    $response['success'] = false;
    $response['message'] = 'No session data found';
}

echo json_encode($response);
?>
