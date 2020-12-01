<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>退出页面</title>
<style>
       body{
            background:url(../image/b3.jfif);
       }
    </style>
</head>
<body>
<?php
session_start();
function tc(){
    echo'
<table align="center" width="360px">
        <tr>
            <td><a href="manageshow.php">返回管理员主页</a></td>
        </tr>
</table>
<table align="center" width="360px">
<form action="" method="post" width="600px">
<tr>
        <td  style="font-weight:bold;"><input type="radio" name="out" value="1" >仅退出</td>
        <td style="font-weight:bold;" align="right"><input type="radio" name="out" value="2">完全退出（指删除账号并退出）</td>
</tr>
<tr>
    <td colspan="2" align="center"><input type="submit" name="submit" value="确定"></td>
</tr>
</form>
</table>';
}
 if (isset($_SESSION['muser'])) {
     tc();
     if (isset($_POST["submit"])) {
         $out=$_POST["out"];
         if ($out==1) {
             header("location:../firstpage.html");
         } else {
             session_start();
             setcookie("muser", "", time()-600);
             session_unset();
             session_destroy();
             mysql_close($conn);
             header("location:../firstpage.html");
         }
     }
 }
 else{
    echo'<h1 align="center">您未登陆，不可访问</h1>';
  }
?>
</body>
</html>