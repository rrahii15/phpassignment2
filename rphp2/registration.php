<?php 
include 'header.php';
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    // Check if the username or email already exists
    $stmt = $pdo->prepare("SELECT * FROM admindata WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);

    if ($stmt->fetch()) {
        echo "<div class='alert alert-danger'>Username or email already exists!</div>";
    } else {
        $stmt = $pdo->prepare("INSERT INTO admindata (username, password, email) VALUES (?, ?, ?)");
        if ($stmt->execute([$username, $password, $email])) {
            echo "<div class='alert alert-success'>Registration successful!</div>";
            header("Refresh: 2; url=login.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Error during registration!</div>";
        }
    }
}
?>

<div class="container mt-5">
    <h2>Admin Registration</h2>
    <form action="registration.php" method="post" class="mt-3">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<?php include 'footer.php'; ?>
