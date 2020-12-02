<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改租户中</title>
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
         $result=mysql_query("select * from fuser", $conn);
         $id=intval($_GET['id']);
         $name=$_POST["name"];
         $gender=$_POST["gender"];
         $sfz=$_POST["sfz"];
         $phone=$_POST["phone"];
         $homeid=$_POST["homeid"];
         $alltime=$_POST["alltime"];
         $yj=$_POST["yj"];
         $starttime=$_POST["starttime"];
         $endtime=$_POST["endtime"];
         $j=0;
         if($name==NULL)
         {
            echo"<script>alert('姓名为空!');</script>";
             $j++;
         }
         if($homeid==NULL)
         {
            echo"<script>alert('房屋编号为空!');</script>";
             $j++;
         }
         if($gender==NULL)
         {
            echo"<script>alert('性别为空!');</script>";
             $j++;
         }
         if($sfz==NULL)
         {
            echo"<script>alert('身份证号为空!');</script>";
             $j++;
         }
         if($phone==NULL)
         {
            echo"<script>alert('电话号码为空!');</script>";
             $j++;
         }
         if($alltime==NULL)
         {
            echo"<script>alert('租凭总时长为空!');</script>";
             $j++;
         }
         if($yj==NULL)
         {
            echo"<script>alert('押金为空!');</script>";
             $j++;
         }
         if($starttime==NULL)
         {
            echo"<script>alert('开始时间为空!');</script>";
             $j++;
         }
         if($endtime==NULL)
         {
            echo"<script>alert('结束时间为空!');</script>";
             $j++;
         }
         if ($j==0) {
             $sql="update fuser set name='$name',homeid='$homeid',sfz='$sfz',phone='$phone',gender='$gender',alltime='$alltime',yj='$yj',starttime='$starttime',endtime='$endtime' where id=$id";
             mysql_query($sql) or die('执行失败');
             echo"<script>alert('该租户信息已修改成功！确认后跳转回租户管理页面');location.href='manageshow_fuser.php'</script>";
         }else{
            echo"<script>alert('修改信息不全，修改失败！确认后跳转回租户管理页面');location.href='manageshow_fuser.php'</script>";
         }
     }
     else{
         echo'<h1 align="center">您未登录，不可访问</h>';
     }
    ?>
</body>
</html>