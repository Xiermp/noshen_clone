<?php
    session_start();
    $firt_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $paswword = $_POST['password'];
    $cheak_password = $_POST['cheak_password'];
    $email = $_POST['email'];


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" href="..\css\style.css">
</head>
<body>
    <nav>
        <div class="global_navigation">
            <div>aasd</div>
        </div>
    </nav>
    
    <!-- <header>hello</header> -->
    <div class="header">
        <nav>
            
                <!-- <dl><a href="">a</a></dl>
                <dl><a href="">a</a></dl>
                <dl><a href="">a</a></dl> -->
                <div>1</div>
                <div>2</div>
            
        </nav>
    </div>
    <button id="hideBtn">Hide it</button>
    <div class="reg_pos">
        <div class="fast_reg" id="regBox">
            <form action="" method="post">
                <input type="text" name="first_name" class="inputt" id="" value="first name">
                <input type="text" name="second_name" class="inputt" id="" value="second name">
                <input type="password" name="password" class="inputt" id="" value="pasword">
                <input type="password" name="cheak_password" class="inputt" id="" value="cheak pasword">
                <input type="submit" value="submit">
            </form>
        </div>
    </div>
    <hr>
    <a href="work_area.php">turn to work</a> 

    
<script>
    document.getElementById('hideBtn').onclick = function () {
    document.getElementById('regBox').classList.toggle('unhidden');
};

</script>
</body>
</html>