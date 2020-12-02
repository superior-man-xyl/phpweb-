<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户查找结果</title>
    <style>
       body{
            background:url(../image/b3.jfif);
       }
    </style>
</head>
<body>
<a href="manageshow_fuser.php">租客管理</a>
<a href="manageshow_house.php">房屋管理</a>
<a href="manageshow_user.php">返回用户管理信息页</a>
<a href="moutsystem.php">退出系统</a> 
 <h3><a href="manageshow_user.php">重新查询</a></h3>
    <?php 
     session_start();
     if(isset($_SESSION['muser'])){
    echo'<h3 align="center">用户查询结果</h3>';
    $conn=mysql_connect("localhost", "root", "");
       mysql_query("set names 'utf8'");
       mysql_select_db("house", $conn);
       $result=mysql_query("select * from user", $conn);
       $keyword=trim($_GET['keyword']);
       $sel=$_GET['sel'];
       if($keyword<>"")
       {
           $sql="select * from user where $sel like '%$keyword%'";
           $rs=mysql_query($sql)or die('执行失败');
           if(mysql_num_rows($rs)>0)
       {
           echo"<p>关键字为'$keyword',共找到".mysql_num_rows($rs)."个符合用户</p>";
       
       echo'<form method="post" action="manageshow_user.php?del=1">
       <table border="1" width="95%">
           <tr bgcolor="#e0e0e0">
               <th>编号</th>
               <th>姓名</th>
               <th>账户密码</th>
               <th>性别</th>
               <th>身份证号码</th>
               <th>电话号码</th> 
               <th colspan="2">删除</th>
   </tr>';
   while ($row=mysql_fetch_assoc($rs)) {
    echo"
<tr>
<td>{$row['id']}</td>
<td>{$row['name']}</td>
<td>{$row['password']}</td>
<td>{$row['gender']}</td>
<td>{$row['sfz']}</td>
<td>{$row['phone']}</td>
<td align='center'><input type='checkbox' name='selected[]' value=' {$row['id']}'/></td>
<td align='center'><a href='edituserform.php?id={$row['id']}'>编辑</a></td>
</tr>
";
}
echo'<tr bgcolor="#e0e0e0"><td></td><td></td><td></td><td></td><td></td><td></td>
<td align="center"><input type="submit" value="删除"><!--删除按钮-->
</td>
<td></td>
</tr>
</table>
</form>';
}
else{
    echo'<h3 align="center">没有搜索到任何用户！请重新查询！</h3>';
}
       }else{
           header("location:manageshow_user.php");
       }
       
}
else{
    echo'<h1 align="center">您未登录，不可访问</h1>';
}
    ?>
  
</body>
</html>