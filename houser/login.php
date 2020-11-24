<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆页</title>
</head>
<body>
    <?php  
    ob_start();
    session_start();
    $conn=mysql_connect("localhost","root","");
    // if ($conn->connect_error) {
    //     die("连接失败: " . $conn->connect_error);
    // } 
    // echo "连接成功";
    mysql_query("set names 'utf8'");
    mysql_select_db("house",$conn);
    $result=mysql_query("select * from user",$conn);
    print_r(mysql_fetch_assoc($result));
    function dlb()
    {
        echo'<h2 align="center">系统登陆</h2>
        <br/><br/>
        <form action="" method="post">
         <table border="0" align="center">
          <tr>
            <td scope="col"><label for="user">用户名&nbsp;&nbsp;&nbsp;</label></td>
            <td colspan="2" scope="col"><input type="text" name="user" id="user" /></td>
            </tr>
          <tr>
            <td> <label for="pass">密&nbsp;&nbsp;&nbsp;&nbsp;码&nbsp;&nbsp;&nbsp;</label></td>
            <td colspan="2"><input type="password" name="pass" id="pass" /></td>
            </tr>
          <tr>
            <td  colspan="2" align="left"><input type="submit" name="submit" id="button" value="登陆" /></td>
            <td align="right" width=90px><a href="注册页.php" style="text-decoration:none;">注册</a></td>
            <td align="right" width=90px><a href="管理员登陆.php" style="text-decoration:none;">管理员登陆</a></td>
            </tr>
        </table>
        </form>';
    }
    dlb();
    // if(isset($_SESSION["user"]))
    // {
    //     header("location:用户主页.php");
    // }
    // else if(isset($_POST["submit"]))
    // {
    //     $name=$_POST["user"];
    //     $pass=$_POST["pass"];
    //     if($name==NULL||$pass==NULL)
    //     {
    //         dlb();
    //         echo'<p align="center" style="color:red;">用户名或密码为空！';
    //     }
    //     else{
    //         $conn=mysql_connect("127.0.0.1","root","");
    //         mysql_query("set names 'utf_8'");
    //         mysql_select_db("house",$conn);
    //         $result=mysql_query("select * from user",$conn);
    //         print_r(mysql_fetch)
            // while($row=mysql_fetch_assoc($result))
            // {
            //     echo'';
            // }
    //         if (isset($_SESSION['user'])) {
    //             for ($i=0,$j=1;$i<count($_COOKIE['name']);$i++) {
    //                 if ($name==$_COOKIE['name'][$i] ) {
    //                     if($pass==$_COOKIE['ps'][$i])
    //                     {
    //                         header("location:显示资料.php");
    //                     }
    //                     else{
    //                         dlb();
    //                         echo'<h3 align="center" style="color:red;">密码错误</h3>';
    //                     }
    //                 } else {
    //                     $j++;
    //                     if ($j==count($_COOKIE['name'])) {
    //                         dlb();
    //                         echo'<h3 align="center" style="color:red;">请先注册</h3>';
    //                     }
    //                 }
    //             }
    //         } else
    //         {
    //             dlb();
    //             echo'<h3 align="center" style="color:red;">请先注册</h3>';
    //         }
    //     }
    // }
    // else
    // {
    //     dlb();
    // }
?>
</body>
</html>