<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>修改房屋信息</title>
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
       $result=mysql_query("select * from house", $conn);
      //  $j=0;
      //   if($name==NULL)
      //   {
      //       echo'<p style="color:red;" align="center">姓名为空！</p>';
      //       $j++;
      //   }
       $id=intval($_GET['id']);
       $sql="select * from house where houseid=$id";
       $result=mysql_query($sql, $conn);
       $row=mysql_fetch_assoc($result);
       echo"
<h2 align='center' style='font-weight:bold;'>房屋信息修改</h2>
<br/><br/>
<form action='edithouse.php?id={$row['houseid']}' method='post'>
 <table border='0' align='center'>
  <tr>
    <td>房屋编号</td>
    <td colspan='2' align='center'>{$row['houseid']}</td>
    </tr>
  <tr>
    <td>房屋图片</td>
    <td colspan='2'><img src='{$row['img']}' /></td>
    </tr>
    <tr>
    <td> <label for='state'>出租状态</label></td>
      <td colspan='2'><input type='text' name='state' id='state' value='{$row['state']}' /></td>
    </tr>
    <td> <label for='dizhi'>地址</label></td>
    <td colspan='2'><input type='text' name='dizhi' id='dizhi' value='{$row['dizhi'] }' /></td>
    </tr>
    </tr>
    <td> <label for='huxing'>户型</label></td>
    <td colspan='2'><input type='text' name='huxing' id='huxing' value='{$row['huxing'] }' /></td>
    </tr>
    </tr>
    <td> <label for='chaox'>朝向</label></td>
    <td colspan='2'><input type='text' name='chaox' id='chaox' value='{$row['chaox'] }' /></td>
    </tr>
    </tr>
    <td> <label for='mianji'>面积</label></td>
    <td colspan='2'><input type='text' name='mianji' id='mianji' value='{$row['mianji'] }' /></td>
    </tr>
    </tr>
    <td> <label for='money'>租金</label></td>
    <td colspan='2'><input type='text' name='money' id='money' value='{$row['money'] }' /></td>
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