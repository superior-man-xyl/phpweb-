<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>退租账单页</title>
    <style>
       body{
            background:url(../image/b3.jfif);
       }
    </style>
</head>
<body>
<?php
  session_start();
  if (isset($_SESSION['phone'])) {
     $conn=mysql_connect("localhost", "root", "");
      mysql_query("set names 'utf8'");
      mysql_select_db("house", $conn);
         $alltime=$_GET['alltime'];
         $houseid=$_GET['houseid'];
         $money=intval($_GET['money']);
         echo"
         <table>
         <tr>
         <td colspan=2><h3>账单清算</h3></td>
         </tr>
         <tr>
         <td>结算金额：</td>
         <td>".$alltime*$money."</td>
         </tr>
         <form action='' method='post'>
         <tr>
         <td><input type='radio' name='k' value='0'>取消退房</td>
         <td><input type='radio' name='k' value='1'>账单结算</td>
         </tr>
         <tr><td colspan='2'><input type='submit' name='submit' value='确认操作'/></td></tr>
         </form>
         </table>
         ";
         if(isset($_POST['submit'])){
             $k=$_POST['k'];
             if ($k==0) {
                 echo"<script>alert('操作取消！确认后跳转回用户主页面');location.href='usershow.php'</script>";
             } elseif ($k==1) {
                 $sql="delete from fuser where phone='{$_SESSION['phone']}'";
                 mysql_query($sql) or die('1执行失败');
                 $sql="update house set state='未出租' where houseid=$houseid";
                 mysql_query($sql) or die('2执行失败');
                 // mysql_query("delete From user where id in ($sel)")or die('执行失败');
                 echo"<script>alert('退租成功！确认后跳转回用户主页面');location.href='usershow.php'</script>";
             }
         }
    }
   else{
    echo'<h1 align="center">您未登陆，不可访问</h1>';
  }
?>
</body>
</html>