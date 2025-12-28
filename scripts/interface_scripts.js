function interfaceScripts() {
    document.getElementById("add_seting_button").addEventListener("click", function() {
        const settingsMenu = document.getElementById("settings_menu");
        if (settingsMenu.style.display === "block") {
            settingsMenu.style.display = "none";
        } else {
            settingsMenu.style.display = "block";
        }
    });
    
    console.log("Interface scripts loaded.");
}