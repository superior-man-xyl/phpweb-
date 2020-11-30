<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>退租操作页</title>
</head>
<body>
<a href="usershow.php">回到主页</a>
<a href="xuzu.php">我要续租</a>
<a href="outsystem.php">退出系统</a>
    <?php 
    session_start();
    if (isset($_SESSION['phone'])) {
        // echo $_SESSION['name'];
        echo"<h3 align='center'>亲爱的用户".$_SESSION['name']."请确认好您的房屋信息"."</h3>";
    }
    else{
        echo'<a align="center">您未登陆，禁止访问!</a>';
        echo"<script>alert('您未登陆，禁止访问!确认后进行登陆');location.href='login.php'</script>";
    }
    $conn=mysql_connect("localhost", "root", "");
       mysql_query("set names 'utf8'");
       mysql_select_db("house", $conn);
       $sql="select house.img img,house.dizhi dizhi,fuser.yj yj,fuser.alltime alltime,fuser.starttime starttime,fuser.endtime endtime,house.houseid houseid,house.money money from fuser,house where phone='{$_SESSION['phone']}' and fuser.homeid=house.houseid";
        $result=mysql_query($sql, $conn);
        if(mysql_num_rows($result)>0){
            $row=mysql_fetch_assoc($result);
            echo"<table style='border:1px solid;' align='center' width='600px'>
    <tr>
    <td>我的房屋</td>
    <td><img src='{$row['img']}'></td>
    </tr>
    <tr>
    <td>地址：</td>
    <td>{$row['dizhi']}</td>
    </tr>
    <tr>
    <td>押金：</td>
    <td>{$row['yj']}</td>
    </tr>
    <tr>
    <td>使用期限：</td>
    <td>{$row['alltime']}</td>
    </tr>
    <tr>
    <td>起始时间：</td>
    <td>{$row['starttime']}</td>
    </tr>
    <tr>
    <td>到期时间：</td>
    <td>{$row['endtime']}</td>
    </tr>
    <tr>
    <td colspan='2'><a href='tuizqr.php?alltime={$row['alltime']}&houseid={$row['houseid']}&money={$row['money']}'>确认退租</a></td>
    </tr>
    </form>
    </table>
            ";
        }
        else{
            echo"
            <tr><td colspan='2'>您未租房(<a href='zhufan.php'>我要租房</a>)</td></tr>
            </table>";
        }
    ?>
</body>
</html>