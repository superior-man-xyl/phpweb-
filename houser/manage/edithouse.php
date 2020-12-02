<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改房屋中</title>
    <style>
       body{
            background:url(../image/b3.jfif);
       }
    </style>
</head>
<body>
    <?php
    session_start();
     if (isset($_SESSION['muser'])) {
         $conn=mysql_connect("localhost", "root", "");
         mysql_query("set names 'utf8'");
         mysql_select_db("house", $conn);
         $result=mysql_query("select * from house", $conn);
         $id=intval($_GET['id']);
         $state=$_POST["state"];
         $dizhi=$_POST["dizhi"];
         $huxing=$_POST["huxing"];
         $chaox=$_POST["chaox"];
         $mianji=$_POST["mianji"];
         $money=$_POST["money"];
         $j=0;
        if($state==NULL)
        {
            echo"<script>alert('状态为空!');</script>";
            $j++;
        }
        if($dizhi==NULL)
        {
            echo"<script>alert('地址为空!');</script>";
            $j++;
        }
        if($huxing==NULL)
        {
            echo"<script>alert('户型为空!');</script>";
            $j++;
        }
        if($chaox==NULL)
        {
            echo"<script>alert('朝向为空!');</script>";
            $j++;
        }
        if($mianji==NULL)
        {
            echo"<script>alert('面积为空!');</script>";
            $j++;
        }
        if($money==NULL)
        {
            echo"<script>alert('租金为空!');</script>";
            $j++;
        }
        if ($j==0) {
            $sql="update house set state='$state',dizhi='$dizhi',huxing='$huxing',chaox='$chaox',mianji='$mianji' where houseid=$id";
            mysql_query($sql) or die('执行失败');
            //mysql_close($conn);
            echo"<script>alert('该用户信息已修改成功！确认后跳转回房屋管理页面');location.href='manageshow_house.php'</script>";
        }else{
            echo"<script>alert('信息不全，修改失败！确认后跳转回房屋管理页面');location.href='manageshow_house.php'</script>";
        }
     }
     else{
        echo'<h1 align="center">您未登陆，不可访问</h1>';
      }
    ?>
</body>
</html>