<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改房屋中</title>
</head>
<body>
    <?php
    $conn=mysql_connect("localhost","root","");
    mysql_query("set names 'utf8'");
    mysql_select_db("house",$conn);
    $result=mysql_query("select * from house",$conn);
    $id=intval($_GET['id']);
    $state=$_POST["state"];
    $dizhi=$_POST["dizhi"];
    $huxing=$_POST["huxing"];
    $chaox=$_POST["chaox"];
    $mianji=$_POST["mianji"];
    $money=$_POST["money"];
    $sql="update user set state='$state',dizhi='$dizhi',huxing='$huxing',chaox='$chaox',mianji='$mianji' where houseid=$id";
    mysql_query($sql) or die('执行失败');
    //mysql_close($conn);
    echo"<script>alert('该用户信息已修改成功！确认后跳转回用户管理页面');location.href='manageshow_house.php'</script>";
    ?>
</body>
</html>