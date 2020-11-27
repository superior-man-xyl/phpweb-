<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员登陆页面</title>
</head>
<body>
    <?php
    ob_start();
    session_start();
    function dlb()
    {
        echo'
<h2 align="center">后台系统登陆</h2>
        <br/><br/>
        <form action="" method="post">
         <table border="0" align="center">
          <tr>
            <td scope="col"><label for="user">账户号&nbsp;&nbsp;&nbsp;</label></td>
            <td colspan="2" scope="col"><input type="text" name="user" id="user" /></td>
            </tr>
          <tr>
            <td> <label for="pass">密&nbsp;&nbsp;&nbsp;&nbsp;码&nbsp;&nbsp;&nbsp;</label></td>
            <td colspan="2"><input type="password" name="pass" id="pass" /></td>
            </tr>
          <tr>
            <td  colspan="2" align="left"><input type="submit" name="submit" id="button" value="登陆" /></td>
            <td align="right" width=90px><a href="管理员登陆.php" style="text-decoration:none;">用户登陆</a></td>
            </tr>
        </table>
        </form>   ';
    }
    if(isset($_SESSION["user"]))
    {
        header("location:manageshow_fuser.php");
    }
    else {
        if (isset($_POST["submit"])) 
        {
            $user=$_POST["user"];
            $pass=$_POST["pass"];
            if ($user==null||$pass==null) {
                dlb();
                echo'<p align="center" style="color:red;">用户名或密码为空！';
            } else {
                if ($user=="root"||$pass==123456) {
                    $_SESSION["user"]=$user;
                    $_SESSION['pass']=$pass;
                    header("location:manageshow.html");//用户名和密码都正确，进行跳转到管理员主页面。
                } else {
                    dlb();
                    echo"请检查管理员账户和密码是否正确";
                }
            }
        }
        else
        {
            dlb();
        }
    }
    
    ?>
</body>
</html>