

<!-- <style>
    .setting-box{
        display: block;
        height: 100%;

    }
    .setting-options{
        display: flex;
        gap: 2px;
        margin: 2px;
        background-color: var(--color-gray-300);
    }
    .setting-options:hover {
        background-color: var(--color-gray-100);
    }

</style>
<div class="widget-section">
    <div class="section-header">setting</div>
    <div class="setting-box">
        <div class="setting-option"></div>
        <div class="setting-option"></div>
        <div class="setting-option"></div>
        <div class="setting-option"></div>
    </div>

</div> -->
<style>
    .settings-headers{
        font-size: 14px;
         color: var(--color-gray-500);
          text-transform: uppercase;
    }
    .settings-plase{
        padding: 16px 0;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
    }
</style>
<div style="max-width: 600px; margin: 0 auto; padding: 40px 20px;">
    <h1 style="font-size: 32px; margin-bottom: 24px;">Settings</h1>
    
    <div style="margin-bottom: 32px;">
        <h3 class="settings-headers">My Account</h3>
        <div class="settings-plase">
            <span>Email</span>
            <span style="color: #666;"><?php echo htmlspecialchars($_SESSION['user_email']); ?></span>
        </div>
        <div class="settings-plase">
            <span>Display Name</span>
            <input type="text" value="<?php echo htmlspecialchars($_SESSION['user_name']); ?>" style="border: 1px solid #ccc; border-radius: 4px; padding: 4px 8px;">
        </div>
    </div>
    <div style="margin-bottom: 32px;">
        <h3 class="section-header">Theam</h3>
        <div class="settings-palse">
            <span>style</span>
            <span></span>
            <select name="" id="">
                <a href="" onclick="toggleTheme()" style="background:none; border:1px solid var(--border-color); color:var(--text-main); padding: 5px 10px; cursor:pointer; border-radius: 4px; width:100%; text-align:left;">
                    🌗 Switch Theme
                </a>
                
                
                <option value="">a</option>
                <option value="">a</option>
                <option value="">a</option>
            </select>
            <button onclick="toggleTheme()" style="background:none; border:1px solid var(--border-color); color:var(--text-main); padding: 5px 10px; cursor:pointer; border-radius: 4px; width:100%; text-align:left;">
                    🌗 Switch Theme
                </button>
        </div>
        <div class="settings-palse">
            <span></span>
            <span></span>
        </div>
        <div class="settings-palse">
            <span></span>
            <span></span>
        </div>
        <div class="settings-palse">
            <span></span>
            <span></span>
        </div>
    </div>

    <button style="background: #2383e2; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer;">
        Save Changes
    </button>
</div>
<script src="../scripts/them_change.js"></script>