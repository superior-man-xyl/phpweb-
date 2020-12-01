<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>信息修改</title>
    <style>
       body{
            background:url(../image/b3.jfif);
       }
    </style>
</head>
<body>
<a href="outsystem.php">退出系统</a>
    <?php
    session_start();
     if (isset($_SESSION['phone'])) {
         $conn=mysql_connect("localhost", "root", "");
         mysql_query("set names 'utf8'");
         mysql_select_db("house", $conn);
         $sql="select * from user where id={$_SESSION['id']}";
        $result=mysql_query($sql, $conn);
        $row=mysql_fetch_assoc($result);
         echo"
         <h2 align='center' style='font-weight:bold;'>用户信息修改</h2>
         <br/><br/>
         <form action='?id={$row['id']}' method='post'>
          <table border='0' align='center'>
           <tr>
             <td><label for='user'>姓名</label></td>
             <td colspan='2'><input type='text' name='name' id='user' value=' {$row['name']}' /></td>
             </tr>
           <tr>
             <td> <label for='pass'>密&nbsp;&nbsp;&nbsp;&nbsp;码</label></td>
             <td colspan='2'><input type='text' name='pass' id='pass' value='{$row['password']}' /></td>
             </tr>
             <tr>
             <td> <label for='sfz'>身份证</label></td>
               <td colspan='2'><input type='text' name='sfz' id='sfz' value='{$row['sfz']}' /></td>
             </tr>
             <td> <label for='phone'>手机号</label></td>
             <td colspan='2'><input type='text' name='phone' id='phone' value='{$row['phone'] }' /></td>
             </tr>
             </tr>
             <td> <label for='gender'>性别</label></td>
             <td colspan='2'><input type='text' name='gender' id='gender' value='{$row['gender'] }' /></td>
             </tr>
           <tr>
             <td  colspan='3' align='center'><input type='submit' name='submit' id='button' value='提交' /></td>
             </tr>
         </table>
         </form>";
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
            echo"<script>alert('该用户信息已修改成功！确认后跳转回用户页面');location.href='usershow.php'</script>";
        }else{
            echo"<script>alert('信息不全！确认后跳转回用户页面');location.href='usershow.php'</script>";
        }
        
     }
     else{
        echo'<h1 align="center">您未登陆，不可访问</h1>';
      }
    ?>
</body>
</html>