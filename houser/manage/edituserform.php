<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>修改用户信息</title>
<style>
       body{
            background:url(../image/b3.jfif);
       }
    </style>
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
      $sql="select * from user where id=$id";
       $result=mysql_query($sql, $conn);
       $row=mysql_fetch_assoc($result);
       echo"
<h2 align='center' style='font-weight:bold;'>用户信息修改</h2>
<br/><br/>
<form action='edituser.php?id={$row['id']}' method='post'>
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
   }
   else{
    echo'<h1 align="center">您未登陆，不可访问</h1>';
  }
?>
</body>
</html>