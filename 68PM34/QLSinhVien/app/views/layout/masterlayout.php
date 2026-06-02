<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .header{
            width: 100%;
            height: 80px;
            background-color: #333;
            flex-shrink: 0;
        }
        .content{
            width: 60%;
            margin: 20px auto;
            flex: 1;
        }
        .footer{
            width: 100%;
            height: 80px;
            background-color: #333;
            flex-shrink: 0;
            margin-top: auto;
        }
    </style>
</head>
<body>
   <div class="header">
    <?php
    require_once __DIR__ . '/partial/header.php';
    ?>
   </div> 
   <div class="content">
    <?php
    if (isset($contentview)) {
        require_once '../app/views/' . $contentview . '.php';
    }
    ?>
   </div>
   <div class="footer">
    <?php
    require_once __DIR__ . '/partial/footer.php';
    ?>
   </div>
</body>
</html>