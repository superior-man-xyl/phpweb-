<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户主页</title>
    <style>
        div{
            /* background-color:green; */
            color:black;
            height:100px;
            width:100px;
        }
    div:nth-child(odd){
            background-color:yellow;
        }
    </style>
</head>
<body>
<a href="outsystem.php">退出系统</a>
    <?php
    session_start();
    if (isset($_SESSION['phone'])) {
        // echo $_SESSION['name'];
        echo"欢迎您，亲爱的用户".$_SESSION['name'];
    }
    else{
        echo'<a align="center">您未登陆，禁止访问!</a>';
        echo"<script>alert('您未登陆，禁止访问!确认后进行登陆');location.href='login.php'</script>";
    }
    ?>
    <div><a href='zhufan.php'>我要租房</a></div>
    <div><a href='tuifan.php'>我要退房</a></div>
    <div><a href='xuzu.php'>我要续租</a></div>
    <div><?php 
    echo"<div><table style='border:1px solid;' align='center' width='600px'>
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
    </tr></table></div>";
    ?></div>
</body>
</html>