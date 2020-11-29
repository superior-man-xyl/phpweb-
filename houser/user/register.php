<DOCTYPE html>
<head>
<meta charset="utf-8">
<title>注册页</title>
</head>
<body>
        <h2 align="center">新用户注册</h2>
        <br/><br/>
        <form action="" method="post">
         <table border="0" align="center">
          <tr>
            <td scope="col"><label for="name">姓名</label></td>
            <td colspan="2" scope="col"><input type="text" name="name" id="name" /></td>
            </tr>
            <td scope="col"><label for="phone">电话</label></td>
            <td colspan="2" scope="col"><input type="text" name="phone" id="phone" /></td>
            </tr>
            <td scope="col"><label for="sfz">身份证号</label></td>
            <td colspan="2" scope="col"><input type="text" name="sfz" id="sfz" /></td>
            </tr>
          <tr>
            <td> <label for="pass">密&nbsp;&nbsp;&nbsp;&nbsp;码</label></td>
            <td colspan="2"><input type="password" name="password" id="pass" /></td>
            </tr>
            <tr>
                <td>性别</td>
                <td colspan="2" ><input type="radio" name="gender" value="男" >男
                <input type="radio" name="gender" value="女">女<br/></td>
            </tr>
          <tr>
            <td  colspan="3" align="center"><input type="submit" name="submit" id="button" value="提交" /></td>
            </tr>
        </table>
        </form>
    <?php
    session_start();
    if(isset($_POST["submit"]))
    {
        $name=$_POST["name"];
        $gender=$_POST["gender"];
        $password=$_POST["password"];
        $sfz=$_POST["sfz"];
        $phone=$_POST["phone"];
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
        if($j==0)
        {
         $conn=mysql_connect("localhost", "root", "");
         mysql_query("set names 'utf8'");
         mysql_select_db("house", $conn);
         $result=mysql_query("select * from user", $conn);
         $sql="insert into user (name,password,sfz,phone,gender)values('$name','$password','$sfz','$phone','$gender')";
         mysql_query($sql) or die('执行失败');
            echo"<script>alert('该用户已经成功注册为新用户！确认后跳转回登陆页面');location.href='login.php'</script>";
        }
    }
    ?>
</body>