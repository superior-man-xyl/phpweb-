<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>退出页面</title>
</head>
<body>
<table align="center" width="360px">
        <tr>
            <td><a href="manageshow.html">返回管理员主页</a></td>
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
</table>
<?php
if(isset($_POST["submit"]))
{
    $out=$_POST["out"];
    if ($out==1) {
        header("location:firstpage.html");
    } else{
        session_start();
        setcookie("user", "", time()-600);
        session_unset();
        session_destroy();
        mysql_close($conn);
        header("location:firstpage.html");
    }
}
?>
</body>
</html>