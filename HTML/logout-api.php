<?php
header('Content-Type: application/json');
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

$response = array('success' => true, 'message' => 'Logout successful.');

echo json_encode($response);
?>