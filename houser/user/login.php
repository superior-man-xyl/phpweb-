<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>登陆页</title>
<link rel="stylesheet" type="text/css" href="../login.css">
</head>
<body>
    <?php  
    // ob_start();
    session_start();
    function dlb()
    {
        echo'<div><h2 align="center">系统登陆</h2>
        <br/><br/>
        <form action="" method="post">
         <table border="0" align="center">
          <tr>
            <td scope="col"><label for="user">账户号&nbsp;&nbsp;&nbsp;</label></td>
            <td colspan="2" scope="col"><input type="text" name="phone" id="phone" /></td>
            </tr>
          <tr>
            <td> <label for="pass">密&nbsp;&nbsp;&nbsp;&nbsp;码&nbsp;&nbsp;&nbsp;</label></td>
            <td colspan="2"><input type="password" name="pass" id="pass" /></td>
            </tr>
          <tr>
            <td  colspan="2" align="left"><input type="submit" name="submit" id="button" value="登陆" /></td>
            <td align="right" width=90px><a href="register.php" style="text-decoration:none;">注册</a></td>
            <td align="right" width=90px><a href="../manage/managelogin.php" style="text-decoration:none;">管理员登陆</a></td>
            </tr>
        </table>
        </form></div>';
    }
    $conn=mysql_connect("localhost","root","");
    // if ($conn->connect_error) {
    //     die("连接失败: " . $conn->connect_error);
    // } 
    // echo "连接成功";
    mysql_query("set names 'utf8'");
    mysql_select_db("house",$conn);
    $result=mysql_query("select * from user",$conn);
    //print_r(mysql_fetch_assoc($result));
    if(isset($_SESSION['phone']))
    {
      header("location:usershow.php");
    }
    else
    { 
      if(isset($_POST["submit"]))
      {
      $phone=$_POST['phone']; 
      $pass=$_POST['pass'];
      $a=0;
      $row=0;
      if($phone==NULL||$pass==NULL)
      {
        dlb();
        echo"<p style='color:red;'>用户名或者密码为空，请检查</style>";
      }
      else//用户名和密码都填写了
      {
        while ($row=mysql_fetch_assoc($result))
          {
            $a=1;
              if ($row['phone']==$phone) 
              {
                  if ($row['password']==$pass) 
                  {
                    $_SESSION["phone"]=$phone;
                    $_SESSION['pass']=$pass;
                    $_SESSION['name']=$row['name'];
                    $_SESSION['sfz']=$row['sfz'];
                    $_SESSION['gender']=$row['gender'];
                    $_SESSION['id']=$row['id'];
                    header("location:usershow.php");
                  break;
                  } 
                  else 
                  {
                      dlb();
                      echo"<p style='color:red;'>密码错误</p>";
                  break;
                  }
              }
          }  
      }
      if ($row==false&&$a==1) 
          {
              dlb();
              echo"<p style='color:red'>用户不存在</p>";
          }
    }
    else
    {
      // echo"<p style='color:red;'>xcxvcvsdf</p>";
      dlb();
    }
  }
    ?>
    </body>
    </html>