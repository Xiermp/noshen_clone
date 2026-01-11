<div class="settings-container">
    <div class="settings-header">Settings & Members</div>

    <div class="settings-group">
        <div class="settings-group-title">My Account</div>
        
        <div class="setting-row">
            <div class="setting-info">
                <h4>Email</h4>
                <p>Your email address used for logging in</p>
            </div>
            <div class="setting-control">
                <span style="color: var(--text-muted); font-size: 14px;">
                    <?= htmlspecialchars($_SESSION['user_email'] ?? 'No email') ?>
                </span>
            </div>
        </div>

        <div class="setting-row">
            <div class="setting-info">
                <h4>Preferred Name</h4>
            </div>
            <div class="setting-control">
                <input type="text" value="<?= htmlspecialchars($_SESSION['user_name'] ?? '') ?>" placeholder="Your name">
                <button class="setting-btn">Update</button>
            </div>
        </div>
    </div>

    <div class="settings-group">
        <div class="settings-group-title">App Settings</div>

        <div class="setting-row">
            <div class="setting-info">
                <h4>Appearance</h4>
                <p>Customize how Notion looks on your device</p>
            </div>
            <div class="setting-control">
                <select onchange="if(this.value === 'dark') { document.documentElement.setAttribute('data-theme', 'dark'); localStorage.setItem('theme', 'dark'); } else { document.documentElement.setAttribute('data-theme', 'light'); localStorage.setItem('theme', 'light'); }">
                    <option value="light">Light Mode</option>
                    <option value="dark">Dark Mode</option>
                </select>
            </div>
        </div>
    </div>

    <div class="settings-group">
        <div class="settings-group-title" style="color: #eb5757;">Danger Zone</div>
        
        <div class="setting-row">
            <div class="setting-info">
                <h4>Log out</h4>
                <p>Sign out of your account on this device</p>
            </div>
            <div class="setting-control">
                <a href="index.php" class="setting-btn">Log out</a>
            </div>
        </div>

        <div class="setting-row">
             <div class="setting-info">
                <h4 style="color: #eb5757;">Delete Account</h4>
            </div>
            <div class="setting-control">
                <button class="setting-btn danger">Delete my account</button>
            </div>
        </div>
    </div>
    <div class="settings-group">

    </div>
</div>