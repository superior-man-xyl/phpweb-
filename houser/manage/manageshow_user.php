<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员管理页面(所有用户)</title>
    <style>
       body{
            background:url(../image/b3.jfif);
       }
       tr:nth-child(odd){
    background: rgb(186, 200, 204);
}
tr:nth-child(even){
    background:rgb(122,133,136);
}
    </style>
</head>
<body>
<a href="manageshow.php">首页</a>
<a href="manageshow_fuser.php">租客管理</a>
<a href="manageshow_house.php">房屋管理</a>
<a href="moutsystem.php">退出系统</a>
    <?php 
    session_start();
     if (isset($_SESSION['muser'])) {
         $conn=mysql_connect("localhost", "root", "");
         mysql_query("set names 'utf8'");
         mysql_select_db("house", $conn);
         $result=mysql_query("select * from user", $conn);
         // print_r(mysql_fetch_assoc($result));
         echo'<form method="get" action="searchuser.php">
         <div style="border:1px solid gray; background:#eee;padding:4px;">
            查找用户，请输入关键字:<input name="keyword" type="text">
            <select name="sel">
            <option value="name">名字</option>
            <option value="phone">电话</option>
            </select>
            <input type="submit" value="查询">
         </div>
         </form>';
         if (@$_GET['del']==1) {
             $selectid=$_POST["selected"];
             if (count($selectid)>0) {
                 $sel=implode(',', $selectid);
                 mysql_query("delete From user where id in ($sel)")or die('执行失败');
                 header("location:manageshow_user.php");//刷新页面
             } else {
                 echo'<script>alert("没有被选中的记录!");</script>';
             }
         }
     }
    ?>
<form method="post" action="?del=1">
    <table border="1" width="95%">
        <tr bgcolor="#e0e0e0">
            <th>编号</th>
            <th>姓名</th>
            <th>账户密码</th>
            <th>性别</th>
            <th>身份证号码</th>
            <th>电话号码</th> 
            <th colspan="2">删除</th>
</tr><?php
 if (isset($_SESSION['muser'])) {
     while ($row=mysql_fetch_assoc($result)) {
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
 }
 else{
    echo'<h1 align="center">您未登陆，不可访问</h1>';
  }
?>
<tr bgcolor="#e0e0e0"><td></td><td></td><td></td><td></td><td></td><td></td>
<td align="center"><input type="submit" value="删除"><!--删除按钮-->
</td>
<td></td>
</tr>
</table>
</form>
</body>
</html>