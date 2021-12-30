<?php
    require_once './../controllers/UserController.php';
    $action = '';



    if(isset($_GET['action'])) {
        $action = $_GET['action'];
        if($action === 'all-users') {
            $users = new UserController();
            echo $users->index();
        } else if($action === 'delete'){
            $users = new UserController();
            echo $users->destroy($_GET['row_id']);
        }else if($action === 'update'){
            $users = new UserController();
            echo $users->updateUser($_GET['row_id'], $_GET['name']);
        }
    } else if(isset($_POST['action'])) {
        $users = new UserController();
        echo $users->store($_POST['name']);
    }