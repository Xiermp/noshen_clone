<!-- <link rel="stylesheet" href="../../css/style_2.css">
<link rel="stylesheet" href="../../css/style_work_ar.css"> -->
<!-- <link rel="stylesheet" href="style.css"> -->

<h1 class="greeting-title">
    <div style="padding: 80px 40px; max-width: 800px; margin: 0 auto;">
    <h1 class="greeting-title" style="font-size: 40px; margin-bottom: 10px;">
        <?php echo $greeting; ?>, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
    </h1>
    <p style="font-size: 18px; color: var(--text-muted);">
        Your random number for today: <span style="color: var(--text-main); font-weight: 600;"><?php echo $your_num; ?></span>
    </p>
    
    <div style="margin-top: 40px; display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div style="padding: 20px; border: 1px solid var(--border-color); border-radius: 8px;">
            <h3>Getting Started</h3>
            <p style="font-size: 14px; color: var(--text-muted);">Click "Add a page" in the sidebar to create your first document.</p>
        </div>
    </div>
</div>

        <div class="widget-section">
            <div class="section-header">🕒 Recently visited</div>
            <div class="center-grid">
                <div class="card-grid">
                    <a href="#" class="card">
                        <div>
                            <div class="card-icon">👋</div>
                            <div class="card-title">Welcome to Notion</div>
                        </div>
                        <div class="card-meta">You visited 5m ago</div>
                    </a>

                    <a href="#" class="card">
                        <div>
                            <div class="card-icon">✅</div>
                            <div class="card-title">Task List</div>
                        </div>
                        <div class="card-meta">You visited 1h ago</div>
                    </a>
                    
                    <a href="#" class="card" style="border-style: dashed;">
                        <div>
                            <div class="card-icon">➕</div>
                            <div class="card-title">New page</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="widget-section">
            <div class="section-header">📚 Learn</div>
            
            <div class="card-grid">
                <a href="#" class="card">
                    <div class="card-title">What is a block?</div>
                    <div class="card-meta">2m read</div>
                </a>
                <a href="#" class="card">
                    <div class="card-title">Customize & style</div>
                    <div class="card-meta">5m read</div>
                </a>
                <a href="#" class="card">
                    <div class="card-title">Create your first page</div>
                    <div class="card-meta">Video • 4m</div>
                </a>
            </div>
        </div>