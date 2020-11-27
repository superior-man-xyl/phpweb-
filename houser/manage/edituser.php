<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改用户中</title>
</head>
<body>
    <?php
    $conn=mysql_connect("localhost","root","");
    mysql_query("set names 'utf8'");
    mysql_select_db("house",$conn);
    $result=mysql_query("select * from user",$conn);
    $id=intval($_GET['id']);
    $name=$_POST["name"];
    $password=$_POST["pass"];
    $sfz=$_POST["sfz"];
    $phone=$_POST["phone"];
    $gender=$_POST["gender"];
    $sql="update user set name='$name',password='$password',sfz='$sfz',phone='$phone',gender='$gender' where id=$id";
    mysql_query($sql) or die('执行失败');
    echo"<script>alert('该用户信息已修改成功！确认后跳转回用户管理页面');location.href='manageshow_user.php'</script>";
    ?>
</body>
</html>