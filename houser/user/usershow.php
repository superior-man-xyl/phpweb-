<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户主页</title>
    <link rel="stylesheet" text="text/css" href="../usershow.css">
   <style>
       table{
    margin-top: 200px;
    border:1px solid;
}
.d1{
    padding-left: 40px;
    width: 100%;
    height: 20px;
    display:flex;
}
.d2{
    /* float:right; */
    flex:1;
    background:rgba(221, 147, 10, 0.884);
    width: 25%;
    display:inline-block ;
    color:#fff;
    border-radius: 8px;
    font-size: 1.25em;
    text-decoration: none;
}
.d2:hover{
    color: rgb(186, 200, 204);
    margin-top:20px;
    background: yellow;
}
tr:nth-child(odd){
    background: rgb(186, 200, 204);
}
tr:nth-child(even){
    background:rgb(122,133,136);
}
td{
    border:1px solid;
}
    </style> 
</head>
<body>

    <?php
    session_start();
    if (isset($_SESSION['phone'])) {
        // echo $_SESSION['name'];
        echo"<h1 align='center'>欢迎您，亲爱的用户".$_SESSION['name']."</h1>";
    }
    else{
        echo'<a align="center">您未登陆，禁止访问!</a>';
        echo"<script>alert('您未登陆，禁止访问!确认后进行登陆');location.href='login.php'</script>";
    }
    ?>
    <div class="d1">
    <a href="outsystem.php"><div class="d2">退出系统</div></a>
    <a href='zhufan.php'><div class="d2">我要租房</div></a>
    <a href='tuiz.php'><div class="d2">我要退房</div></a>
    <a href='xuzu.php'><div class="d2">我要续租</div></a>
</div>
    <?php 
    echo"<div class='f1'><table  align='center' width='700px'>
    <tr><th colspan='2' align='center'><h3> 我的基本信息</h3></tr>
    <tr>
    <td>名字：</td>
    <td>{$_SESSION['name']}</td>
    </tr>
    <tr>
    <td>电话号码：</td>
    <td>{$_SESSION['phone']}</td>
    </tr>
    <tr>
    <td>身份证号：</td>
    <td>{$_SESSION['sfz']}</td>
    </tr>
    <tr>
    <td>性别：</td>
    <td>{$_SESSION['gender']}</td>
    </tr></div>";
    $conn=mysql_connect("localhost", "root", "");
       mysql_query("set names 'utf8'");
       mysql_select_db("house", $conn);
       $sql="select house.img img,house.dizhi dizhi,fuser.yj yj,fuser.alltime alltime,fuser.starttime starttime,fuser.endtime endtime from fuser,house where phone='{$_SESSION['phone']}' and fuser.homeid=house.houseid";
        $result=mysql_query($sql, $conn);
        if(mysql_num_rows($result)>0){
            $row=mysql_fetch_assoc($result);
            echo"
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
    </tr></table>
            ";
        }
        else{
            echo"
            <tr><td></td><td colspan='2'>您未租房(<a href='zhufan.php'>我要租房</a>)</td></tr>
            </table>";
        }
    ?></div>
    
</body>
</html>