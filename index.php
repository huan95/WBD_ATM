<?php

require 'model/database.php';
require 'model/postDB.php';
require 'model/atm.php';
require 'model/user.php';
require 'controller/postController.php';

use Controller\PostController;

?>
<html>
<head>
    <meta charset="utf-8">
    <title>Transaction history</title>
</head>
<body>
<div class="container">
    <?php
    $postController = new PostController();
    $page = isset($_REQUEST['page'])? $_REQUEST['page'] : NULL;

    switch ($page){
        case 'add':
            $postController->add();
            break;
        case 'history':
            $postController->history();
            break;
        case 'index':
            $postController->index();
            break;
        default:
            $postController->login();
            break;
    }

    ?>

</div>
</body>
</html>