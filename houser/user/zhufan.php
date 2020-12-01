<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>租房</title>
    <style>
       body{
            background:url(../image/b3.jfif);
       }
    </style>
</head>
<body>
    <?php 
    session_start();
     if (isset($_SESSION['phone'])) {
          echo' <a href="usershow.php">首页</a>
                <a href="outsystem.php">退出系统</a>';
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
         $conn=mysql_connect("localhost", "root", "");
         mysql_query("set names 'utf8'");
         mysql_select_db("house", $conn);
         $result=mysql_query("select * from house", $conn);
         // print_r(mysql_fetch_assoc($result));
     }
    ?>
<form method="post" action="?del=1">
    <table border="1" width="95%">
        <tr bgcolor="#e0e0e0">
            <th>房屋图片</th>
            <th>房屋地址</th>
            <th>户型</th>
            <th>朝向</th>
            <th>面积</th> 
            <th>租金</th>
</tr><?php
 if (isset($_SESSION['phone'])) {
     while ($row=mysql_fetch_assoc($result)) {
         if($row['state']!="已出租"){
             echo"
     <tr>
     <td><img src='{$row['img']}'></td>
     <td>{$row['dizhi']}</td>
     <td>{$row['huxing']}</td>
     <td>{$row['chaox']}</td>
     <td>{$row['mianji']}</td>
     <td>{$row['money']}</td>
     <td align='center'><a href='fwstate.php?id={$row['houseid']}'>租下</a></td>
 </tr>
     ";
         }
     }
 }
 else{
    echo'<h1 align="center">您未登陆，不可访问</h1>';
  }
?>
<tr bgcolor="#e0e0e0"><td colspan="8"></td>
<td></td>
</tr>
</table>
</form>
</body>
</html>