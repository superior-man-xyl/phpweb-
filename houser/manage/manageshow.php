<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员主页</title>
    <style>
        
       body{
            background:url(../image/b3.jfif);
       }
        *{
            padding: 0;
            margin: 0;
        }
        div{
            /* width: 30%;
            height: 30%; */
            margin-top:200px;
            margin-left: 100px;
        }
        .d1{
            background-color: #06e5f5;
            /* float:right; */
            border-radius: 8px;
            width:16%;
            padding:0 auto;
            margin:0 auto;
            margin-top:20px;
            padding-left:12px;
        }
        .d2{
            background-color:#05949e;
            /* float:right; */
            border-radius: 8px;
            width:16%;
            padding:0 auto;
            margin:0 auto;
            margin-top:20px;
            padding-left:12px;
        }
        .d3{
            background-color:#03bbc9;
            /* float:right; */
            border-radius: 8px;
            width:16%;
            padding:0 auto;
            margin:0 auto;
            margin-top:20px;
            padding-left:12px;
        }
        .d4{
            background-color:#047f88;
            /* float:right; */
            border-radius: 8px;
            width:16%;
            padding:0 auto;
            margin:0 auto;
            margin-top:20px;
            padding-left:12px;
        }
        a{
            font:3em "黑体";
            color:black;
            padding-top:20px;
            text-decoration: none;
        }
        a:hover{
            font-size: 3.1em;
        }
    </style>
</head>
<body>
    <?php 
        session_start();
        if(isset($_SESSION['muser'])){
            echo'<h1 align="center">请选择模块</h1><div class="d1"><a href="manageshow_user.php">查看用户</a></div>
    <div class="d3"><a href="manageshow_house.php" >房屋管理</a></div>
    <div class="d2"><a href="manageshow_fuser.php">查看租户</a></div>
    <div class="d4"><a href="moutsystem.php">退出登陆</a></div>';
        }
        else{
            echo'<h1 align="center">您未登录，不可访问</h1>';
        }
    ?>
    
</body>
</html>