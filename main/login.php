<?php
session_start();

// Database Configuration
$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "notion_clone";

// Connect to Database
$conn = new mysqli($servername, $username, $password_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = "";

// Handle Login Logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password_input = $_POST['password'];

    // SQL query to find user by email
    $sql = "SELECT id, first_name, password FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify the hashed password
        if (password_verify($password_input, $row['password'])) {
            // Success! Start Session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['first_name'];
            $_SESSION['user_email'] = $email;
            
            header("Location: work_area.php");
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "No account found with that email.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in - Notion</title>
    <link rel="stylesheet" href="../css/style_2.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/style_anim_1.css">
    <style>
        body {
            font-family: var(--font-family-sans);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: var(--color-white);
            color: var(--color-text);
            margin: 0;
        }
        .login-container {
            width: 100%;
            max-width: 360px;
            padding: var(--spacing-24);
            text-align: center;
        }
        h1 {
            font-size: var(--font-size-600);
            font-weight: var(--font-weight-bold);
            margin-bottom: var(--spacing-24);
            color: var(--text-main);
        }
        .input-group {
            margin-bottom: var(--spacing-16);
            text-align: left;
        }
        label {
            display: block;
            font-size: var(--font-size-50);
            color: var(--text-main);
            margin-bottom: var(--spacing-4);
        }
        input {
            width: 100%;
            padding: var(--spacing-8) var(--spacing-12);
            border: 1px solid var(--color-gray-300);
            border-radius: var(--border-radius-200);
            font-size: var(--font-size-100);
            box-sizing: border-box;
        }
        input:focus {
            outline: 2px solid var(--color-blue-400);
            border-color: transparent;
        }
        button {
            background-color: var(--button-colo-1);
            color: white;
            border: none;
            padding: var(--spacing-8) var(--spacing-16);
            border-radius: var(--border-radius-200);
            font-size: var(--font-size-200);
            cursor: pointer;
            width: 100%;
            margin-top: var(--spacing-16);
            box-shadow: 0 0 20px var(--shadow-box);

            transition: all 0.4s ease;
        }
        button:hover {
            /* filter: brightness(0.8); */
            scale: 1.1;
            box-shadow: 0 0 5px var(--shadow-box);

        }
        .error {
            color: var(--color-red-600);
            background: var(--color-red-100);
            padding: var(--spacing-8);
            border-radius: var(--border-radius-200);
            margin-bottom: var(--spacing-16);
            font-size: var(--font-size-100);
        }
        .bottom-link {
            margin-top: var(--spacing-24);
            font-size: var(--font-size-100);
            color: var(--color-gray-600);
        }
        .bottom-link a {
            color: var(--color-text);
            text-decoration: underline;
        }
    </style>
    
</head>
<body class="body-1">

    <div class="login-container">
        <div style="margin-bottom: 20px; color: var(--text-main);">
            <svg width="40" height="40" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M4 4V20H20V4H4ZM2 4C2 2.89543 2.89543 2 4 2H20C21.1046 2 22 2.89543 22 4V20C22 21.1046 21.1046 22 20 22H4C2.89543 22 2 21.1046 2 20V4Z"
                    fill="currentColor"/>
            </svg>
        </div>

        <h1>Log in</h1>

        <?php if (!empty($error_message)): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" required placeholder="Enter your email">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Enter your password">
            </div>

            <button type="submit">Continue</button>
        </form>

        <div class="bottom-link">
            Don't have an account? <a href="registration.php">Sign up</a>
        </div>
        <div class="bottom-link" style="margin-top: 10px;">
            <a href="index.php">Back to Home</a>
        </div>
    </div>
<script src="../scripts/them_change.js"></script>
</body>
</html>