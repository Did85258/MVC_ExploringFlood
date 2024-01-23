<?php
    if(isset($_GET['controller'])&&isset($_GET['action'])){
        $controller =$_GET['controller'];
        $action = $_GET['action'];
    }
    else{
        $controller = 'pages';
        $action = 'home';
    }?>

    <html>
    <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <script language="JavaScript" type="text/javascript">
        function checkDelete(){
            return confirm('Are you sure?');
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php include "navbar.php"?><br>
        <?php echo "controller = ".$controller.",action=".$action;?>
        <?php require_once("routes.php");?>

    </body>
    </html>