<?php
session_start();
require_once '../includes/db.php';
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include '../includes/admin_header.php';
?>

<div class="admin-container">
    <h2>💼 Manage Experience Entries</h2>
    <a href="add_experience.php" class="button-link">➕ Add New Entry</a>

    <?php
    $sql = "SELECT * FROM experience_entries ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0): ?>
        <div class="experience-list">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="experience-card">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                    <div class="experience-actions">
                        <a href="edit_experience.php?id=<?php echo $row['id']; ?>">✏️ Edit</a> |
                        <a href="delete_experience.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">🗑 Delete</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No experience entries yet.</p>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
