<?php
session_start();
require_once '../includes/db.php';
include '../includes/admin_header.php';

// Fetch all projects
$sql = "SELECT * FROM portfolio_items ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<h2>🗂️ Manage Projects</h2>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><img src="../uploads/<?php echo $row['image']; ?>" alt="Thumb" width="100"></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars(substr($row['description'], 0, 100))) . '...'; ?></td>
                    <td>
                        <div class="action-btn-group">
                            <a href="edit_project.php?id=<?php echo $row['id']; ?>" class="dashboard-btn edit-btn">✏️ Edit</a>
                            <a href="delete_project.php?id=<?php echo $row['id']; ?>" class="dashboard-btn delete-btn" onclick="return confirm('Are you sure you want to delete this project?')">🗑️ Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="4">No projects found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- <?php include '../includes/footer.php'; ?> -->
