<?php
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Boundless Moments</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header class="admin-header">
        <div class="admin-header-top">
            <h2>📸 Boundless Moments Admin Panel</h2>
        </div>
        <nav class="admin-nav">
            <a href="dashboard.php">Dashboard</a>
            <a href="add_project.php">Add Project</a>
            <a href="manage_projects.php">Projects</a>
            <a href="view_messages.php">Messages</a>
            <a href="manage_experience.php">Experience</a>
            <a href="../index.php">View Website</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </nav>
    </header>
    <main class="admin-main">
