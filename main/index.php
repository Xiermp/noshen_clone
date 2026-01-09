<?php
// index.php – Landing page only
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Notion – One workspace. Zero busywork.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style_2.css">
    <link rel="stylesheet" href="../css/style_anim_1.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<nav class="nav-bar">
    <div class="nav-inner">
        <div class="nav-left">
            <div class="logo">N</div>
            
            <a href="#">Product</a>
            <a href="#">Solutions</a>
            <a href="#">Resources</a>
            <a href="#">Pricing</a>
        </div>

        <div class="nav-right">
            <a href="#" class="btn ghost">Request a demo</a>
            <a href="login.php" class="btn ghost">Log in</a>
            <a href="registration.php" class="btn primary">Get Notion free</a>
        </div>
        <div style="margin-top: 10px; padding: 0 10px;">
            <button onclick="toggleTheme()" style="background:none; border:1px solid var(--border-color); color:var(--text-main); padding: 5px 10px; cursor:pointer; border-radius: 4px; width:100%; text-align:left;">
                🌗 Switch Theme
            </button>
        </div>
    </div>
</nav>

<main class="page">

    <!-- HERO -->
    <section class="hero">
        <h1>One workspace.<br>Zero busywork.</h1>

        <p class="hero-text">
            Notion is where your teams and AI agents capture knowledge,
            find answers, and automate projects.
        </p>

        <div class="hero-actions">
            <a href="registration.php" class="btn primary large">Get Notion free</a>
            <a href="#" class="btn secondary large">Request a demo</a>
        </div>

        <p class="trusted">
            Trusted by teams at OpenAI, Figma, Cursor, and more
        </p>
    </section>

    <!-- TRUSTED -->
    <section class="trusted-grid">
        <div class="card">
            <h3>OpenAI</h3>
            <p>“There’s power in a single platform where you can do all your work.”</p>
        </div>

        <div class="card">
            <h3>Vercel</h3>
            <p>“Solve a lot of problems with one tool.”</p>
        </div>

        <div class="card">
            <h3>Figma</h3>
            <p>“One hub for work that keeps everyone aligned.”</p>
        </div>
    </section>
    <section class="carousel-section">
    <h2 class="carousel-title">Built for every team</h2>

    <div class="carousel">
        <div class="carousel-track">
            <div class="carousel-card">
                <h3>Engineering</h3>
                <p>Docs, roadmaps, and sprint planning in one place.</p>
            </div>

            <div class="carousel-card">
                <h3>Design</h3>
                <p>Design systems, feedback, and collaboration.</p>
            </div>

            <div class="carousel-card">
                <h3>Product</h3>
                <p>Specs, priorities, and product thinking.</p>
            </div>

            <div class="carousel-card">
                <h3>Marketing</h3>
                <p>Campaigns, calendars, and content planning.</p>
            </div>

            <!-- duplicated for infinite loop -->
            <div class="carousel-card">
                <h3>Engineering</h3>
                <p>Docs, roadmaps, and sprint planning in one place.</p>
            </div>

            <div class="carousel-card">
                <h3>Design</h3>
                <p>Design systems, feedback, and collaboration.</p>
            </div>
        </div>
    </div>
</section>

</main>

<footer class="footer">
    <p>© 2026 Notion-like project</p>
</footer>
<!-- <script>

document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', savedTheme);
});


function toggleTheme() {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    

    document.documentElement.setAttribute('data-theme', newTheme);
    

    localStorage.setItem('theme', newTheme);
}
</script> -->
<script src="../scripts/them_change.js"></script>
</body>
</html>
