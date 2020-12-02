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
       tr:nth-child(odd){
    background: rgb(186, 200, 204);
}
tr:nth-child(even){
    background:rgb(122,133,136);
}
    </style>
</head>
<body>
<?php 
    session_start();
     if (isset($_SESSION['phone'])) {
          echo' <a href="usershow.php">首页</a>
                <a href="outsystem.php">退出系统</a><h3>
                <a href="zhufan.php">重新查询</a></h3>';
                echo'<h3 align="center">房屋查询结果</h3>';
                $conn=mysql_connect("localhost", "root", "");
                   mysql_query("set names 'utf8'");
                   mysql_select_db("house", $conn);
                   $result=mysql_query("select * from house", $conn);
                   $keyword=trim($_GET['keyword']);
                   $sel=$_GET['sel'];
                   if($keyword<>"")
                   {
                       $sql="select * from house where $sel like '%$keyword%'";
                       $rs=mysql_query($sql)or die('执行失败');
                   }
                   if(mysql_num_rows($rs)>0)
                   {
                       echo"<p>关键字为'$keyword',共找到".mysql_num_rows($rs)."个符合房子</p>";
                   
                   echo'<form method="post" action="manageshow_house.php?del=1">
                   <table border="1" width="95%">
                       <tr bgcolor="#e0e0e0">
                       <th>房屋图片</th>
                       <th>房屋地址</th>
                       <th>户型</th>
                       <th>朝向</th>
                       <th>面积</th> 
                       <th>租金</th>
               </tr>';
               while ($row=mysql_fetch_assoc($rs)) {
                   if($row['state']=="未出租"){
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
            }}
            echo'<tr bgcolor="#e0e0e0"><td colspan="8"></td>
            <td></td>
            </tr>
            </table>
            </form>';
            }
            else{
                echo'<h3 align="center">没有搜索到任何房屋！请重新查询！</h3>';
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