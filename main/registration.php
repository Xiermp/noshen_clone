<?php
session_start();

// Database Configuration
$servername = "localhost";
$username = "root"; // Default XAMPP/WAMP username
$password_db = "";  // Default XAMPP/WAMP password (usually empty)
$dbname = "notion_clone";

// 1. Connect to Database
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = "";

// 2. Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $second_name = $conn->real_escape_string($_POST['second_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password_raw = $_POST['password'];
    $check_password = $_POST['check_password'];

    // Basic Validation
    if ($password_raw !== $check_password) {
        $error_message = "Passwords do not match!";
    } else {
        // 3. Securely Hash the Password (Never store plain text passwords!)
        $hashed_password = password_hash($password_raw, PASSWORD_DEFAULT);

        // 4. Insert into Database
        $sql = "INSERT INTO users (first_name, second_name, email, password) 
                VALUES ('$first_name', '$second_name', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            // Success: Log them in instantly or redirect
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = $first_name;
            header("Location: work_area.php");
            exit();
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();

// $Main_user_file = mkdir("../data/user_files/".$_SESSION['user_email'], 0777, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notion Clone - Sign Up</title>
    <link rel="stylesheet" href="../css/style_2.css">
    <style>
        /* Simple inline styles to utilize your CSS variables */
        body {
            font-family: var(--font-family-sans);
            background-color: var(--color-white);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: var(--color-text);
        }
        .auth-container {
            width: 100%;
            max-width: 400px;
            padding: var(--spacing-32);
            text-align: center;
        }
        h1 {
            font-size: var(--font-size-600);
            font-weight: var(--font-weight-bold);
            margin-bottom: var(--spacing-24);
        }
        .input-group {
            margin-bottom: var(--spacing-16);
            text-align: left;
        }
        label {
            display: block;
            font-size: var(--font-size-50);
            color: var(--color-gray-600);
            margin-bottom: var(--spacing-4);
        }
        input {
            width: 100%;
            padding: var(--spacing-8) var(--spacing-12);
            border: 1px solid var(--color-gray-300);
            border-radius: var(--border-radius-200);
            font-size: var(--font-size-100);
            box-sizing: border-box; /* Ensures padding doesn't break width */
        }
        input:focus {
            outline: 2px solid var(--color-blue-400);
            border-color: transparent;
        }
        button {
            background-color: var(--color-red-500); /* Notion often uses red/pink for buttons */
            color: white;
            border: none;
            padding: var(--spacing-8) var(--spacing-16);
            border-radius: var(--border-radius-200);
            font-size: var(--font-size-200);
            cursor: pointer;
            width: 100%;
            margin-top: var(--spacing-16);
        }
        button:hover {
            background-color: var(--color-red-600);
        }
        .error {
            color: var(--color-red-600);
            font-size: var(--font-size-100);
            margin-bottom: var(--spacing-16);
        }
    </style>
</head>
<body>

    <div class="auth-container">
        <div style="margin-bottom: 20px;">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 4V20H20V4H4ZM2 4C2 2.89543 2.89543 2 4 2H20C21.1046 2 22 2.89543 22 4V20C22 21.1046 21.1046 22 20 22H4C2.89543 22 2 21.1046 2 20V4Z" fill="black"/></svg>
        </div>

        <h1>Sign up</h1>

        <?php if (!empty($error_message)): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form action="registration.php" method="POST">
            <div class="input-group">
                <label>First Name</label>
                <input type="text" name="first_name" required placeholder="Enter first name">
            </div>
            
            <div class="input-group">
                <label>Last Name</label>
                <input type="text" name="second_name" required placeholder="Enter last name">
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" required placeholder="Enter your email">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Create a password">
            </div>

            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="check_password" required placeholder="Confirm password">
            </div>

            <button type="submit">Continue</button>
        </form>
        
        <p style="margin-top: 20px; font-size: var(--font-size-50);">
            Already have an account? <a href="login.php" style="color: var(--color-blue-600);">Log in</a>
        </p>
    </div>

</body>
</html>