<?php
session_start();
require_once '../includes/db.php';
include '../includes/admin_header.php';

$success = "";
$error = "";

// Get project ID
if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = intval($_GET['id']);

// Fetch current project
$stmt = $conn->prepare("SELECT * FROM portfolio_items WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$project = $result->fetch_assoc();

if (!$project) {
    header("Location: dashboard.php");
    exit();
}

// Handle update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    if (!empty($title) && !empty($description)) {
        // If a new image was uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $image_name = time() . '_' . basename($_FILES['image']['name']);
            $target = '../uploads/' . $image_name;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $stmt = $conn->prepare("UPDATE portfolio_items SET title = ?, description = ?, image = ? WHERE id = ?");
                $stmt->bind_param("sssi", $title, $description, $image_name, $id);
            } else {
                $error = "Image upload failed.";
            }
        } else {
            // No new image
            $stmt = $conn->prepare("UPDATE portfolio_items SET title = ?, description = ? WHERE id = ?");
            $stmt->bind_param("ssi", $title, $description, $id);
        }

        if ($stmt->execute()) {
            $success = "Project updated successfully!";
            // Refresh project data
            $stmt = $conn->prepare("SELECT * FROM portfolio_items WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $project = $result->fetch_assoc();
        } else {
            $error = "Failed to update project.";
        }
    } else {
        $error = "All fields are required.";
    }
}
?>

<h2>✏️ Edit Project</h2>

<div class="form-container">
    <?php if ($success): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php elseif ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="" enctype="multipart/form-data">
        <label>Project Title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" required>

        <label>Description:</label>
        <textarea name="description" rows="5" required><?php echo htmlspecialchars($project['description']); ?></textarea>

        <label>Current Image:</label><br>
        <img src="../uploads/<?php echo $project['image']; ?>" width="200" style="margin-bottom: 15px;"><br>

        <label>Upload New Image (optional):</label>
        <input type="file" name="image" accept="image/*"><br>

        <button type="submit">Update Project</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
