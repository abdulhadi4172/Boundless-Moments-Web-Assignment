<?php
session_start();
require_once '../includes/db.php';

// Check admin login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Ensure ID is present
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = intval($_GET['id']);

// Fetch image filename first
$stmt = $conn->prepare("SELECT image FROM portfolio_items WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    $imageFile = '../uploads/' . $row['image'];
    if (file_exists($imageFile)) {
        unlink($imageFile); // delete the image from uploads folder
    }

    // Now delete from DB
    $stmt = $conn->prepare("DELETE FROM portfolio_items WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Redirect back
header("Location: dashboard.php?deleted=1");
exit();
?>
