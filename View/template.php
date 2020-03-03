<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="Assets/img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="<?php echo URL_BASE; ?>\Assets\js\jquery-3.4.1.min.js"></script>
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo URL_BASE; ?>/Assets/css/style.css">
</head>
<body>
<div id="modal1" class="modal">
</div>
    <nav>
        <div class="nav-wrapper">
        <a href="<?php echo URL_BASE; ?>/" class="brand-logo center"><img src="Assets/img/logo.png" id="logo"></a>
        <ul id="nav-mobile" class="nav-ul"> 
            <li id="um"><a class="text" href="<?php echo URL_BASE; ?>/sales">Vendas</a></li>
            <li id="dois"><a class="text" href="<?php echo URL_BASE; ?>/employeers">Vendedores</a></li>
        </div>
    </nav>
    <div class="container">
        <?php include($page); ?>
    </div>
    <script type="text/javascript" src="Assets\js\jquery.mask.js"></script>
    <script>var BASE_URL = '<?php echo URL_BASE; ?>';
            $(document).ready(function() {    
                $('.modal').modal();
            });
    </script>
    <script  src="<?php echo URL_BASE; ?>\Assets\js\ajax.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_BASE; ?>\Assets\js\sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
</body>
</html>

