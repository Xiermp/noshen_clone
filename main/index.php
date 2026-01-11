<?php
// index.php – Landing page
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Notion – One workspace. Zero busywork.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/main.css">

    <style>
        /* =========================================
           LANDING PAGE SPECIFIC STYLES (Scoped)
           ========================================= */

        body {
            margin: 0;
            font-family: var(--font-family-sans, -apple-system, sans-serif);
            background-color: var(--bg-main);
            color: var(--text-main);
            line-height: 1.5;
            overflow-x: hidden;
        }

        /* --- Navigation --- */
        .lp-nav {
            position: sticky;
            top: 0;
            z-index: 100;
            background: var(--bg-main);
            border-bottom: 1px solid var(--border-color);
            padding: 0 20px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            backdrop-filter: blur(10px);
            background: rgba(var(--bg-main), 0.9);
        }

        .lp-nav-left, .lp-nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .lp-logo {
            font-weight: 700;
            font-size: 24px;
            margin-right: 10px;
            color: var(--text-main);
            text-decoration: none;
        }

        .lp-link {
            text-decoration: none;
            color: var(--text-main);
            font-size: 15px;
            transition: opacity 0.2s;
        }
        .lp-link:hover { opacity: 0.7; }

        /* --- Buttons --- */
        .lp-btn {
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
            cursor: pointer;
            display: inline-block;
        }

        .lp-btn-ghost {
            color: var(--text-main);
        }
        .lp-btn-ghost:hover { background: var(--bg-hover); }

        .lp-btn-primary {
            background-color: var(--text-main);
            color: var(--bg-main);
            border: 1px solid var(--text-main);
        }
        .lp-btn-primary:hover { opacity: 0.9; transform: translateY(-1px); }

        /* --- Hero Section --- */
        .lp-hero {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
            padding: 80px 20px 60px;
        }

        .lp-hero h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            letter-spacing: -0.02em;
            margin-bottom: 20px;
            line-height: 1.1;
        }

        .lp-hero-text {
            font-size: 1.2rem;
            color: var(--text-muted, #666);
            max-width: 600px;
            margin: 0 auto 30px;
        }

        .lp-hero-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
        }

        .lp-hero-actions .lp-btn {
            padding: 10px 24px;
            font-size: 16px;
        }

        .lp-trusted-text {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            margin-top: 40px;
        }

        /* --- Trusted Grid (Cards) --- */
        .lp-section {
            max-width: 1000px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        .lp-grid-3 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-top: 40px;
        }

        .lp-card {
            background: var(--bg-sidebar);
            border: 1px solid var(--border-color);
            padding: 24px;
            border-radius: 8px;
            transition: transform 0.2s, box-shadow 0.2s;
            text-align: left;
        }

        .lp-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            background: var(--bg-main);
        }

        .lp-card h3 {
            margin: 0 0 10px 0;
            font-size: 18px;
        }

        .lp-card p {
            margin: 0;
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* --- Carousel Section --- */
        .lp-carousel-section {
            background: var(--bg-sidebar);
            padding: 60px 0;
            margin-top: 40px;
            text-align: center;
            overflow: hidden;
        }

        /* --- Footer --- */
        .lp-footer {
            border-top: 1px solid var(--border-color);
            padding: 40px 20px;
            text-align: center;
            font-size: 14px;
            color: var(--text-muted);
        }

        /* --- Utility: Theme Toggle Wrapper --- */
        .theme-toggle-wrap {
            margin-left: 10px;
        }
        
        /* Mobile adjustment */
        @media (max-width: 768px) {
            .lp-nav-left a:not(.lp-logo) { display: none; }
            .lp-hero h1 { font-size: 2.5rem; }
        }
    </style>
</head>
<body>

<nav class="lp-nav">
    <div class="lp-nav-left">
        <a href="#" class="lp-logo">N</a>
        <a href="#" class="lp-link">Product</a>
        <a href="#" class="lp-link">Solutions</a>
        <a href="#" class="lp-link">Resources</a>
        <a href="#" class="lp-link">Pricing</a>
    </div>

    <div class="lp-nav-right">
        <a href="#" class="lp-btn lp-btn-ghost">Request a demo</a>
        <a href="login.php" class="lp-btn lp-btn-ghost">Log in</a>
        <a href="registration.php" class="lp-btn lp-btn-primary">Get Notion free</a>
        
        <div class="theme-toggle-wrap">
            <button onclick="toggleTheme()" style="background:none; border:1px solid var(--border-color); color:var(--text-main); padding: 5px 10px; cursor:pointer; border-radius: 4px;">
                🌗
            </button>
        </div>
    </div>
</nav>

<main>

    <section class="lp-hero">
        <h1>One workspace.<br>Zero busywork.</h1>

        <p class="lp-hero-text">
            Notion is where your teams and AI agents capture knowledge,
            find answers, and automate projects.
        </p>

        <div class="lp-hero-actions">
            <a href="registration.php" class="lp-btn lp-btn-primary">Get Notion free</a>
            <a href="#" class="lp-btn lp-btn-ghost" style="border: 1px solid var(--border-color)">Request a demo</a>
        </div>

        <p class="lp-trusted-text">
            Trusted by teams at OpenAI, Figma, Cursor, and more
        </p>

        <div class="lp-grid-3">
            <div class="lp-card">
                <h3>OpenAI</h3>
                <p>“There’s power in a single platform where you can do all your work.”</p>
            </div>

            <div class="lp-card">
                <h3>Vercel</h3>
                <p>“Solve a lot of problems with one tool.”</p>
            </div>

            <div class="lp-card">
                <h3>Figma</h3>
                <p>“One hub for work that keeps everyone aligned.”</p>
            </div>
        </div>
    </section>

    <section class="lp-carousel-section">
        <h2 style="font-size: 2rem; margin-bottom: 40px;">Built for every team</h2>

        <div class="lp-section"> 
            <div class="lp-grid-3" style="text-align: left;">
                <div class="lp-card">
                    <h3>🏗 Engineering</h3>
                    <p>Docs, roadmaps, and sprint planning in one place.</p>
                </div>

                <div class="lp-card">
                    <h3>🎨 Design</h3>
                    <p>Design systems, feedback, and collaboration.</p>
                </div>

                <div class="lp-card">
                    <h3>🚀 Product</h3>
                    <p>Specs, priorities, and product thinking.</p>
                </div>

                <div class="lp-card">
                    <h3>📣 Marketing</h3>
                    <p>Campaigns, calendars, and content planning.</p>
                </div>
            </div>
        </div>
    </section>

</main>

<footer class="lp-footer">
    <p>© 2026 Notion-like project</p>
</footer>

<script src="../scripts/them_change.js"></script>

</body>
</html>