<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="/projeto-web-php/css/estilo.css">
  <meta charset="UTF-8">
  <link rel="icon" type="image/x-icon" href="/projeto-web-php/images/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
</head>

<body >
<nav class="topbar">
        <div class="logo">
            <a href="/projeto-web-php/index.php">
                <img src="/projeto-web-php/images/logo.png" alt="Logo" width="100" height="100">
            </a>
        </div>
        <div class="menu">
          
          <?php 
            require_once(realpath(dirname(__FILE__) . '/../Components/constants/itensMenu.php'));

            foreach ($arr as $k => $a) {
              echo "<a href='/projeto-web-php/".$a."'><h1 class='subItemMenu'>".$k."</h1></a> ";
            }

          ?>
          <h1 class="subItemMenu">itens menu</h1>
        </div>
    </nav>
  <section class="conteudo">
