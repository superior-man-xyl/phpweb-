<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员管理页面(房屋管理)</title>
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
<a href="manageshow_user.php">用户管理</a>
<a href="moutsystem.php">退出系统</a>
    <?php 
    session_start();
    echo'<form method="get" action="searchhouse.php">
         <div style="border:1px solid gray; background:#eee;padding:4px;">
            查找房屋，请输入关键字:<input name="keyword" type="text">
            <select name="sel">
            <option value="huxing">户型</option>
            <option value="dizhi">地址</option>
            </select>
            <input type="submit" value="查询">
         </div>
         </form>';
     if (isset($_SESSION['muser'])) {
         $conn=mysql_connect("localhost", "root", "");
         mysql_query("set names 'utf8'");
         mysql_select_db("house", $conn);
         $result=mysql_query("select * from house", $conn);
         // print_r(mysql_fetch_assoc($result));
         if (@$_GET['del']==1) {
             $selectid=$_POST["selected"];
             if (count($selectid)>0) {
                 $sel=implode(',', $selectid);
                 mysql_query("delete From user where houseid in ($sel)")or die('执行失败');
                 header("location:manageshow_house.php");//刷新页面
             } else {
                 echo'<script>alert("没有被选中的记录!");</script>';
             }
         }
     }
    ?>
<form method="post" action="?del=1">
    <table border="1" width="95%">
        <tr bgcolor="#e0e0e0">
            <th>房屋图片</th>
            <th>房屋编号</th>
            <th>出租状态</th>
            <th>房屋地址</th>
            <th>户型</th>
            <th>朝向</th>
            <th>面积</th> 
            <th>租金</th>
            <th colspan="2">删除</th>
</tr><?php
 if (isset($_SESSION['muser'])) {
     while ($row=mysql_fetch_assoc($result)) {
         echo"
     <tr>
     <td><img src='{$row['img']}'></td>
     <td>{$row['houseid']}</td>
     <td>{$row['state']}</td>
     <td>{$row['dizhi']}</td>
     <td>{$row['huxing']}</td>
     <td>{$row['chaox']}</td>
     <td>{$row['mianji']}</td>
     <td>{$row['money']}</td>
     <td align='center'><input type='checkbox' name='selected[]' value=' {$row['houseid']}'/></td>
     <td align='center'><a href='edithouseform.php?id={$row['houseid']}'>编辑</a></td>
 </tr>
     ";
     }
 }
 else{
    echo'<h1 align="center">您未登陆，不可访问</h1>';
  }
?>
<tr bgcolor="#e0e0e0"><td colspan="8"></td>
<td align="center"><input type="submit" value="删除"><!--删除按钮-->
</td>
<td></td>
</tr>
</table>
</form>
</body>
</html>