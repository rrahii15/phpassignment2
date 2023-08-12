<?php 
include 'header.php';
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the hashed password for the given username
    $stmt = $pdo->prepare("SELECT * FROM admindata WHERE username = ?");
    $stmt->execute([$username]);

    if ($user = $stmt->fetch()) {
        if (password_verify($password, $user['password'])) {
            // Password is correct; start a new session and save username to the session
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];

            header("Location: loginsuccess.php"); // Redirect to the home page
            exit;
        } else {
            echo "<div class='alert alert-danger'>Incorrect password!</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Username not found!</div>";
    }
}
?>

<div class="container mt-5">
    <h2>Admin Login</h2>
    <form action="login.php" method="post" class="mt-3">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php include 'footer.php'; ?>
