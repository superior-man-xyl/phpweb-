<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员管理页面(所有用户)</title>
</head>
<body>
<a href="manageshow_fuser.php">租客管理</a>
    <?php 
    $conn=mysql_connect("localhost","root","");
    mysql_query("set names 'utf8'");
    mysql_select_db("house",$conn);
    $result=mysql_query("select * from user",$conn);
   // print_r(mysql_fetch_assoc($result));
    if(@$_GET['del']==1){
        $selectid=$_POST["selected"];
        if(count($selectid)>0){
            $sel=implode(',',$selectid);
            mysql_query("delete From user where id in ($sel)")or die('执行失败');
            header("location:manageshow_user.php");//刷新页面
        }
        else{
            echo'<script>alert("没有被选中的记录!");</script>';
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
</tr><?php
 while($row=mysql_fetch_assoc($result))
 {
     echo"
     <tr>
     <td>{$row['id']}</td>
     <td>{$row['name']}</td>
     <td>{$row['password']}</td>
     <td>{$row['gender']}</td>
     <td>{$row['sfz']}</td>
     <td>{$row['phone']}</td>
     <td align='center'><input type='checkbox' name='selected[]' value=' {$row['id']}'/></td>
     <td align='center'><a href='#'>编辑</a></td>
 </tr>
     ";
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