<?php
session_start();
require_once '../includes/db.php';
include '../includes/admin_header.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    if (!empty($title) && !empty($description) && isset($_FILES['image'])) {
        $image_name = time() . '_' . basename($_FILES['image']['name']);
        $target = '../uploads/' . $image_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $sql = "INSERT INTO portfolio_items (title, description, image) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $title, $description, $image_name);

            if ($stmt->execute()) {
                $success = "Project added successfully!";
            } else {
                $error = "Error saving to database.";
            }
        } else {
            $error = "Image upload failed.";
        }
    } else {
        $error = "All fields are required.";
    }
}
?>

<h2>➕ Add New Portfolio Item</h2>

<div class="form-container">
    <?php if ($success): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php elseif ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="" enctype="multipart/form-data">
        <label>Project Title:</label>
        <input type="text" name="title" required>

        <label>Description:</label>
        <textarea name="description" rows="5" required></textarea>

        <label>Upload Image:</label>
        <input type="file" name="image" accept="image/*" required>

        <button type="submit">Add Project</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
