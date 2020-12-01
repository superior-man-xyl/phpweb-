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
            background-color: darkkhaki;
            float:right;
        }
        .d2{
            background-color:darkseagreen;
            float:right;
        }
        .d3{
            background-color:cadetblue;
            float:right;
        }
        .d4{
            background-color:chartreuse;
            float:right;
        }
        a{
            font:3em "黑体";
            color:black;
            text-decoration: none;
        }
        a:hover{
            font-size: 4em;
        }
    </style>
</head>
<body>
    <?php 
        session_start();
        if(isset($_SESSION['muser'])){
            echo'<h1 align="center">请选择模块</h1><div class="d1"><a href="manageshow_user.php">查看用户</a></div>
    <div class="d3"><a href="manageshow_house.php">房屋管理</a></div>
    <div class="d2"><a href="manageshow_fuser.php">查看租户</a></div>
    <div class="d4"><a href="moutsystem.php">退出登陆</a></div>';
        }
        else{
            echo'<h1 align="center">您未登录，不可访问</h1>';
        }
    ?>
    
</body>
</html>