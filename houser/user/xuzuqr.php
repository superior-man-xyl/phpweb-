<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>租房确认</title>
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
     $conn=mysql_connect("localhost", "root", "");
      mysql_query("set names 'utf8'");
      mysql_select_db("house", $conn);
     if(isset($_POST['submit'])){
         $time=intval($_POST['time']);
         $num=intval($_GET['num']);
         $endtime=$_GET['endtime'];
    //     $str=time();
    //   $starttime=date('Y-m-d');
    //  var_dump($starttime);
    $num=$num+$time;
    echo $endtime."<br/>";
    //date("Y-m-d",strtotime("+$time month",strtotime("$endtime")));
    $str=strtotime("$endtime");
      $endtime=date("Y-m-d",($str+$time*30*24*60*60));
    //  var_dump($endtime);
      echo $time.$num.$endtime;
      $sql="update fuser set alltime=$num,endtime='{$endtime}' where phone='{$_SESSION['phone']}'";
      mysql_query($sql) or die('执行失败');
      //$result=mysql_query($sql,$conn);
     // var_dump($result);//or die('执行失败');
      echo"<script>alert('续租成功！确认后跳转回用户主页面');location.href='usershow.php'</script>";
        }
     }
   else{
    echo'<h1 align="center">您未登陆，不可访问</h1>';
  }
?>
</body>
</html>