
<h1>Login</h1>
<?php

if(isset($_GET["error"])){
    if($_GET["error"] == "wronglogin"){
        echo "<p>錯誤的使用者帳號或密碼</p>";
    }
}

?>
<form method="POST" action="login.inc.php">
    <input id="username" placeholder="Username" required="" autofocus="" type="text" name="username">
    <input id="password" placeholder="Password" required="" type="password" name="password">
    <button  type="submit">登入</button>
</form>

<a href="signup.php">Sign up</a>
<br>
<a href='index.php'>Home page</a>