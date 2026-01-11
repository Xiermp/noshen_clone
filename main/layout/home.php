<!-- <link rel="stylesheet" href="../../css/style_2.css">
<link rel="stylesheet" href="../../css/style_work_ar.css"> -->
<!-- <link rel="stylesheet" href="style.css"> -->
<?php $your_num = rand(1, 9999); ?>
<h1 class="greeting-title"><?php echo $greeting; ?>, <?php echo htmlspecialchars($_SESSION['user_name']); ?><br>your number is : <?php echo $your_num ?></h1>

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