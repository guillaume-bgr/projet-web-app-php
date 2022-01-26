<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busyness</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php __DIR__ ?>../../node_modules/datatables.net-dt/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?php __DIR__ ?>../../assets/style/css/style.css">
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.4/datatables.min.js"></script>
</head>

<body>
    <header>
        <?php if($_SESSION) { ?>
            <a href="/views/menu.php">
                <img src="<?php __DIR__ ?>/assets/img/BUSYNESS.svg" alt="logo">
            </a>
        <?php } else { ?>      
            <a href="#">
                <img src="<?php __DIR__ ?>/assets/img/BUSYNESS.svg" alt="logo">
            </a>
        <?php } ?>
    </header>