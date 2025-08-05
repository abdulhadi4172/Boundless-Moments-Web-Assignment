<?php
require_once 'includes/db.php';
include 'includes/header.php';

// Fetch images
$sql = "SELECT * FROM portfolio_items ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<section class="gallery-section">
    <h2>🖼️ Photography Gallery</h2>

    <?php if ($result->num_rows > 0): ?>
        <div class="gallery-grid">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="gallery-card">
                    <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Gallery Image">
                    <div class="caption">
                        <h4><?php echo htmlspecialchars($row['title']); ?></h4>
                        <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No gallery items found.</p>
    <?php endif; ?>
</section>

<?php include 'footer.php'; ?>
