<title>Edit Message</title>
<?php
include 'style.html';
$name = $_GET['name'];
$id = $_GET['id'];
?>

<body>

<?php
require_once('config.php');
$query = "SELECT * FROM board WHERE  id=" . $id; //選出該位使用者所留下的所有留言
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
	?>
      <div class="content">
                <div class="m-b-md">
                    <form name="form1" action="edit.inc.php" method="POST">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="hidden" name="name" value="<?=$_GET['name']?>">
                        <p>CONTENT</p>
                        <textarea style="font-family: 'Nunito', sans-serif; font-size:20px; width:550px; height:100px;" name="content"><?=$row['content']?></textarea>
                        <p><input type="submit" name="submit" value="SAVE">
                    <style>
                        input {padding:5px 15px; background:#ccc; border:0 none;
                        cursor:pointer;
                        -webkit-border-radius: 5px;
                        border-radius: 5px; }
                    </style>
                    <style>
                        input {
                            padding:5px 15px;
                            background:#FFCCCC;
                            border:0 none;f
                            cursor:pointer;
                            -webkit-border-radius: 5px;
                            border-radius: 5px;
                            font-family: 'Nunito', sans-serif;
                            font-size: 19px;
                        }
                    </style>
                    </form>
                </div>

</body>
</html>
<?php }
?>