<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

$success = "";
$error = "";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: manage_experience.php");
    exit();
}

$id = intval($_GET['id']);

// Fetch existing data
$stmt = $conn->prepare("SELECT * FROM experience_entries WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$experience = $result->fetch_assoc();

if (!$experience) {
    header("Location: manage_experience.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    if (!empty($title) && !empty($description)) {
        $stmt = $conn->prepare("UPDATE experience_entries SET title = ?, description = ? WHERE id = ?");
        $stmt->bind_param("ssi", $title, $description, $id);

        if ($stmt->execute()) {
            $success = "✅ Experience updated successfully!";
            // Refresh updated data
            $stmt = $conn->prepare("SELECT * FROM experience_entries WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $experience = $result->fetch_assoc();
        } else {
            $error = "❌ Failed to update experience.";
        }
    } else {
        $error = "⚠️ All fields are required.";
    }
}

include '../includes/admin_header.php';
?>

<div class="admin-container">
    <h2>✏️ Edit Experience Entry</h2>
    <p><a href="manage_experience.php">← Back to Experience List</a></p>

    <?php if ($success): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php elseif ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($experience['title']); ?>" required><br>

        <label>Description:</label>
        <textarea name="description" rows="5" required><?php echo htmlspecialchars($experience['description']); ?></textarea><br>

        <button type="submit">Update Experience</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
