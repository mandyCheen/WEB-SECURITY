    <h1>Sign Up</h1>
    <?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "invaliduid"){
            echo "<p>無效的使用者名稱</p>";
        }
        else if($_GET["error"] == "passwordsdontmatch"){
            echo "<p>密碼不相同</p>";
        }
        else if($_GET["error"] == "usernametaken"){
            echo "<p>使用者名稱已存在</p>";
        }
    }
    ?>
    <form action="signup.inc.php" method="post">
        <input id="username" type="text" required="" name="username" placeholder="Username...">
        <br>
        <input id="password" type="password" required="" name="password" placeholder="Password...">
        <br>
        <input id="passwordrepeat" type="password" required="" name="passwordrepeat" placeholder="Repeat password...">
        <br>
        <button type="submit" name="submit">註冊</button>
    </form>
    <a href='index.php'>Home page</a>


