<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    if(isset($_SESSION["name"]))
    {
         header("location:用户主页.php");
    }
    else if(isset($_POST["submit"]))//判断是否提交表单
    {
        $name=$_POST["user"];
        $pass=$_POST["pass"];
        if($name==NULL||$pass==NULL){
            dlb();
            echo'<p align="center" style="color:red;">用户名或密码为空!</p>';
        }
        else{
            while ($row=mysql_fetch_assoc($result)){
                if ($row['name']==$name){
                    if ($row['password']==$pass){
                        $_SESSION['name']=$name;
                        $_SESSION['pass']=$pass;
                        // header("location:用户主页.php");
                    } 
                    else{
                        dlb();
                        echo'密码错误！';
                    }
                }
            }
            // echo"用户名不存在";
        }
    ?>
</body>
</html>

where($row=mysql_fetch_assoc($result))
 {?>
<tr>
    <td><?php print_r($row['id']) ?></td>
    <td><?php print_r($row['name']) ?></td>
    <td><?php print_r($row['password']) ?></td>
    <td><?php print_r($row['gender']) ?></td>
    <td><?php print_r($row['sfz']) ?></td>
    <td><?php print_r($row['phone']) ?></td>
    <td align="center"><input type="checkbox" name="selected" value="<?php $row['id'] ?>"/></td>
    <td align="center"><a href="#">编辑</a></td>
</tr>);
<?php
 }
?>


where($row=mysql_fetch_assoc($result))
 {
     echo'
<tr>
    <td>'.$row['id'].'</td>
    <td>'.($row['name'].'</td>
    <td>'.$row['password'].'</td>
    <td>'.$row['gender'].'</td>
    <td>'.$row['sfz'].'</td>
    <td>'.$row['phone'].'</td>
    <td align="center"><input type="checkbox" name="selected" value="'.$row['id'].'"/></td>
    <td align="center"><a href="#">编辑</a></td>
</tr>';
}
?>