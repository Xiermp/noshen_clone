<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notion - One workspace. Every team.</title>
    <link rel="stylesheet" href="../css/style_2.css"> <style>
        body {
            font-family: var(--font-family-sans);
            margin: 0;
            color: var(--color-text);
            background-color: var(--color-white);
        }

        /* Navigation Bar */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--spacing-16);
            border-bottom: 1px solid var(--color-gray-200);
            position: sticky;
            top: 0;
            background: var(--color-white);
            z-index: 1000;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: var(--spacing-24);
            font-weight: var(--font-weight-medium);
            font-size: var(--font-size-100);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: var(--spacing-16);
        }

        .logo {
            font-weight: var(--font-weight-bold);
            font-size: var(--font-size-300);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            text-decoration: none;
            color: var(--color-text);
        }
        .nav-link:hover {
            color: var(--color-gray-600);
        }

        /* Hero Section - The "One Workspace" area */
        .hero {
            text-align: center;
            padding: var(--spacing-64) var(--spacing-16);
            max-width: 1000px;
            margin: 0 auto;
        }

        h1 {
            font-size: var(--font-size-900); /* Large text like the screenshot */
            line-height: 1.1;
            font-weight: var(--font-weight-bold);
            margin-bottom: var(--spacing-24);
            letter-spacing: -0.04em;
        }

        .subtext {
            font-size: var(--font-size-400);
            color: var(--color-text);
            max-width: 700px;
            margin: 0 auto var(--spacing-32);
            line-height: 1.5;
        }

        /* Buttons */
        .btn {
            padding: var(--spacing-8) var(--spacing-16);
            border-radius: var(--border-radius-200);
            text-decoration: none;
            font-weight: var(--font-weight-medium);
            font-size: var(--font-size-100);
            transition: background 0.2s;
            display: inline-block;
        }

        .btn-primary {
            background-color: var(--color-purple-600); /* Notion Blue */
            color: white;
        }
        .btn-primary:hover {
            background-color: var(--color-purple-700);
        }

        .btn-secondary {
            color: var(--color-text);
            background-color: transparent;
        }
        .btn-secondary:hover {
            background-color: var(--color-gray-200);
        }

        .btn-hero-secondary {
            background-color: var(--color-purple-100);
            color: var(--color-purple-600);
            font-weight: var(--font-weight-semibold);
        }
        .btn-hero-secondary:hover {
            background-color: var(--color-purple-200);
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: var(--spacing-16);
        }

        /* Image Placeholder for the faces illustration */
        .hero-image-placeholder {
            margin-bottom: var(--spacing-32);
        }
    </style>
</head>
<body>

    <nav>
        <div class="nav-left">
            <a href="#" class="logo">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 4V20H20V4H4ZM2 4C2 2.89543 2.89543 2 4 2H20C21.1046 2 22 2.89543 22 4V20C22 21.1046 21.1046 22 20 22H4C2.89543 22 2 21.1046 2 20V4Z" fill="black"/></svg>
                Notion
            </a>
            <a href="#" class="nav-link">Product</a>
            <a href="#" class="nav-link">Download</a>
            <a href="#" class="nav-link">Solutions</a>
            <a href="#" class="nav-link">Resources</a>
            <a href="#" class="nav-link">Pricing</a>
        </div>
        <div class="nav-right">
            <a href="#" class="btn btn-secondary">Request a demo</a>
            <div style="width: 1px; height: 24px; background: var(--color-gray-300); margin: 0 8px;"></div>
            <a href="login.php" class="btn btn-secondary">Log in</a>
            <a href="registration.php" class="btn btn-primary">Get Notion free</a>
        </div>
    </nav>

    <div class="hero">
        <div class="hero-image-placeholder">
            <img src="https://www.notion.so/cdn-cgi/image/format=auto,width=640,quality=100/front-static/pages/home/home-hero-yield-v2.png" alt="Team Illustration" style="max-width: 100%; height: auto;">
        </div>

        <h1>One workspace.<br>Zero busywork.</h1>
        
        <p class="subtext">
            Notion is where your teams and AI agents capture knowledge, find answers, and automate projects. Now a team of 7 feels like 70.
        </p>

        <div class="hero-buttons">
            <a href="registration.php" class="btn btn-primary" style="padding: 12px 24px; font-size: var(--font-size-300);">Get Notion free</a>
            <a href="#" class="btn btn-hero-secondary" style="padding: 12px 24px; font-size: var(--font-size-300);">Request a demo</a>
        </div>
        
        <div style="margin-top: 40px; color: var(--color-gray-500);">
            <p>Trusted by teams at OpenAI, Figma, Cursor, and more</p>
        </div>
    </div>

</body>
</html>