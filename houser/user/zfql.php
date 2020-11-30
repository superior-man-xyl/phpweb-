<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>租房确认</title>
</head>
<body>
  <?php
  session_start();
  function ql($row){
         echo"
    <h2 align='center' style='font-weight:bold;'>房屋信息确认</h2>
    <br/><br/>
    <form action='' method='post'>
     <table border='0' align='center'>
      <tr>
      <tr>
        <td>房屋图片</td>
        <td colspan='2'><img src='{$row['img']}' /></td>
        </tr>
        <tr>
        <td>地址</td>
        <td colspan='2'>{$row['dizhi']}</td>
        </tr>
        </tr>
        <td>户型</td>
        <td colspan='2'>{$row['huxing']}</td>
        </tr>
        </tr>
        <td>朝向</td>
        <td colspan='2'>{$row['chaox']}</td>
        </tr>
        </tr>
        <td>面积</td>
        <td colspan='2'>{$row['mianji']}</td>
        </tr>
        </tr>
        <td>租金</td>
        <td colspan='2'>{$row['money']}</td>
        </tr>
        <td>押金</td>
        <td colspan=2>1000</td>
        </tr>
        <tr>
        <td><label for='alltime'>租聘时长</label></td>
        <td colspan='2'><input type='text' name='alltime' id='alltime'></td>
        </tr>
      <tr>
        <td  colspan='3' align='center'><input type='submit' name='submit' id='button' value='确认' /></td>
        </tr>
    </table>
    </form>";
     }
  if (isset($_SESSION['phone'])) {
      $id=intval($_GET['id']);
     $conn=mysql_connect("localhost", "root", "");
      mysql_query("set names 'utf8'");
      mysql_select_db("house", $conn);
      $sql="select * from house where houseid=$id";
      $result=mysql_query($sql, $conn);
      $row=mysql_fetch_assoc($result);
      ql($row);
     if(isset($_POST['submit'])){
      $phone=$_SESSION["phone"];
      $name=$_SESSION['name'];
      $sfz=$_SESSION['sfz'];
      $gender=$_SESSION['gender'];
      $alltime=$_POST['alltime'];
        $str=time();
      $starttime=date('Y-m-d');
    //  var_dump($starttime);
      $endtime=date('Y-m-d',($str+$alltime*30*24*60*60));
    //  var_dump($endtime);
      echo $id.$alltime.$starttime.$endtime;
      $sql="insert into fuser(name,gender,phone,homeid,sfz,alltime,yj,starttime,endtime) 
      values('{$name}','{$gender}','{$phone}',$id,'{$sfz}',$alltime,'1000','{$starttime}','{$endtime}')";
      mysql_query($sql) or die('执行失败');
      //$result=mysql_query($sql,$conn);
     // var_dump($result);//or die('执行失败');
      echo"<script>alert('租房成功！确认后跳转回用户主页面');location.href='usershow.php'</script>";
        }
     }
   else{
    echo'<h1 align="center">您未登陆，不可访问</h1>';
  }
?>
</body>
</html>