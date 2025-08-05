<?php
require_once 'includes/db.php';
include 'includes/header.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($message)) {
        $sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $success = "✅ Thank you! Your message has been sent.";
        } else {
            $error = "❌ Something went wrong. Please try again.";
        }
    } else {
        $error = "⚠️ All fields are required.";
    }
}
?>

<section class="contact-section">
    <h2>📬 Get in Touch</h2>

    <?php if ($success): ?>
        <p class="alert-success"><?php echo $success; ?></p>
    <?php elseif ($error): ?>
        <p class="alert-error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="" class="contact-form">
        <label for="name">👤 Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">📧 Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="message">📝 Message:</label>
        <textarea name="message" id="message" rows="5" required></textarea>

        <button type="submit">Send Message</button>
    </form>
</section>

<?php include 'footer.php'; ?>
