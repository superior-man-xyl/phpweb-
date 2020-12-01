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
       $id=intval($_GET['id']);
       $conn=mysql_connect("localhost", "root", "");
       mysql_query("set names 'utf8'");
       mysql_select_db("house", $conn);
       $result=mysql_query("select * from house", $conn);
       $sql="update house set state='已出租' where houseid=$id";
       mysql_query($sql) or die('执行失败');
    //    mysql_close($conn);
    header("location:zfql.php?id=$id");
   }
   else{
    
        echo'<h1 align="center">您未登陆，不可访问</h1>';
      
   }
      ?>
      </body>
 </html>