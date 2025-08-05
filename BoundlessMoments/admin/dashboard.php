<?php
session_start();
require_once '../includes/db.php';
include '../includes/admin_header.php';

// Fetch total stats
$project_count = $conn->query("SELECT COUNT(*) AS total FROM portfolio_items")->fetch_assoc()['total'];
$message_count = $conn->query("SELECT COUNT(*) AS total FROM contact_messages")->fetch_assoc()['total'];
$experience_count = $conn->query("SELECT COUNT(*) AS total FROM experience_entries")->fetch_assoc()['total'];
?>

<h2>📊 Dashboard</h2>

<div class="dashboard-stats">
    <div class="card">
        <h3><?php echo $project_count; ?></h3>
        <p>Total Projects</p>
    </div>
    <div class="card">
        <h3><?php echo $message_count; ?></h3>
        <p>Messages</p>
    </div>
    <div class="card">
        <h3><?php echo $experience_count; ?></h3>
        <p>Experience Entries</p>
    </div>
</div>

<div class="dashboard-links">
    <a href="add_project.php" class="dashboard-btn">➕ Add New Project</a>
    <a href="view_messages.php" class="dashboard-btn">📥 View Messages</a>
    <a href="manage_experience.php" class="dashboard-btn">💼 Manage Experience</a>
</div>

<?php include '../includes/footer.php'; ?>
