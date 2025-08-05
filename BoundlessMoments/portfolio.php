<?php
require_once 'includes/db.php';

// Fetch portfolio items from database
$sql = "SELECT * FROM portfolio_items ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio - Boundless Moments</title>
    <link rel="stylesheet" href="style.css"> <!-- or public.css if you're using that -->
</head>
<body>

<?php include 'includes/header.php'; ?>

<section class="portfolio-section">
    <h2 class="section-title">📷 Our Portfolio</h2>

    <div class="portfolio-grid">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="portfolio-card">
                    <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Portfolio Image">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p style="text-align: center;">No portfolio items found.</p>
        <?php endif; ?>
    </div>
</section>

<?php include 'footer.php'; ?>

</body>
</html>
