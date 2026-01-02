<?php
$filename = $_GET['file'] ?? '';
$filepath = $user_dir . "/" . $filename;
$content = file_exists($filepath) ? file_get_contents($filepath) : "";
$title = htmlspecialchars(basename($filename, '.md'));
?>

<div class="editor-wrapper">
    <div class="editor-status" id="save-status">All changes saved</div>
    <div class="editor-header">
        <input type="text" id="file-title" class="file-title-input" 
               value="<?php echo $title; ?>" placeholder="Untitled"
               oninput="handleTitleInput()">
    </div>

    <div class="notion-editor-container">
        <textarea id="markdown-editor" 
                  placeholder="Write hear>>>"
                  oninput="autoResize(this); handleContentInput()"><?php echo htmlspecialchars($content); ?></textarea>
    </div>
</div>

<script>
let saveTimeout;
let titleTimeout;
let currentFile = "<?php echo addslashes($filename); ?>";

const editor = document.getElementById('markdown-editor');
const titleInput = document.getElementById('file-title');
const statusLabel = document.getElementById('save-status');

function autoResize(textarea) {
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
}

function handleContentInput() {
    statusLabel.innerText = "Saving...";
    clearTimeout(saveTimeout);
    saveTimeout = setTimeout(saveContent, 1000);
}

function saveContent() {
    sendData({ file: currentFile, content: editor.value });
}

function handleTitleInput() {
    statusLabel.innerText = "Renaming...";
    clearTimeout(titleTimeout);
    titleTimeout = setTimeout(saveTitle, 1500);
}

function saveTitle() {
    sendData({ file: currentFile, new_title: titleInput.value });
}

function sendData(data) {
    const formData = new FormData();
    for (let key in data) formData.append(key, data[key]);


    fetch('actions/save_file.php', { method: 'POST', body: formData })
    .then(res => res.json())
    .then(result => {
        if (result.status === "renamed") {
            const oldFile = currentFile;
            currentFile = result.new_file;
            

            const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?file=' + encodeURIComponent(currentFile);
            window.history.pushState({path: newUrl}, '', newUrl);


            const sidebarLinks = document.querySelectorAll('.sidebar-menu-item');
            sidebarLinks.forEach(link => {
                if (link.getAttribute('href').includes(encodeURIComponent(oldFile))) {
                    link.setAttribute('href', '?file=' + encodeURIComponent(currentFile));
                    link.innerHTML = '<span>📄</span> ' + result.new_file;
                }
            });

            statusLabel.innerText = "Page renamed";
        } else if (result.status === "saved") {
            statusLabel.innerText = "All changes saved";
        }
    })
    .catch(() => {
        statusLabel.innerText = "Error saving!";
    });
}

autoResize(editor);
</script>