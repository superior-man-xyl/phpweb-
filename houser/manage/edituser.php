<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改用户中</title>
</head>
<body>
    <?php
    session_start();
     if (isset($_SESSION['muser'])) {
         $conn=mysql_connect("localhost", "root", "");
         mysql_query("set names 'utf8'");
         mysql_select_db("house", $conn);
         $result=mysql_query("select * from user", $conn);
         $id=intval($_GET['id']);
         $name=$_POST["name"];
         $password=$_POST["pass"];
         $sfz=$_POST["sfz"];
         $phone=$_POST["phone"];
         $gender=$_POST["gender"];
         $j=0;
        if($name==NULL)
        {
            echo'<p style="color:red;" align="center">姓名为空！</p>';
            $j++;
        }
        if($password==NULL)
        {
            echo'<p style="color:red;" align="center">密码为空！</p>';
            $j++;
        }
        if($gender==NULL)
        {
            echo'<p style="color:red;" align="center">性别为空！</p>';
            $j++;
        }
        if($sfz==NULL)
        {
            echo'<p style="color:red;" align="center">身份证号为空！</p>';
            $j++;
        }
        if($phone==NULL)
        {
            echo'<p style="color:red;" align="center">电话号码为空！</p>';
            $j++;
        }
        if (j==0) {
            $sql="update user set name='$name',password='$password',sfz='$sfz',phone='$phone',gender='$gender' where id=$id";
            mysql_query($sql) or die('执行失败');
            echo"<script>alert('该用户信息已修改成功！确认后跳转回用户管理页面');location.href='manageshow_user.php'</script>";
        }else{
            echo"<script>alert('信息不全！确认后跳转回用户管理页面');location.href='manageshow_user.php'</script>";
        }
     }
     else{
        echo'<h1 align="center">您未登陆，不可访问</h1>';
      }
    ?>
</body>
</html>