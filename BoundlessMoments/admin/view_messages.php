<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Messages - Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php include '../includes/admin_header.php'; ?>

    <div class="admin-container">
        <h2>📩 Contact Messages</h2>

        <?php
        $sql = "SELECT * FROM contact_messages ORDER BY submitted_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0): ?>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>🧑 Name</th>
                            <th>📧 Email</th>
                            <th>📝 Message</th>
                            <th>⏰ Submitted At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                                <td><?php echo $row['submitted_at']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No messages found.</p>
        <?php endif; ?>
    </div>

    <script src="admin.js"></script>
</body>
</html>