<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Make sure an ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: manage_experience.php");
    exit();
}

$id = intval($_GET['id']);

// Delete experience entry
$stmt = $conn->prepare("DELETE FROM experience_entries WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $_SESSION['success_message'] = "✅ Experience deleted successfully!";
} else {
    $_SESSION['error_message'] = "❌ Failed to delete experience.";
}

header("Location: manage_experience.php");
exit();
?>
