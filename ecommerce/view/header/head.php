<?php
    $url_atual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $url_atual2 =  $_SERVER['REQUEST_URI'];
?>    
<?php
        $msgreturn      = '';
        $tipo           = '';
        
        function msg($msgreturn,$tipo){
            if (($msgreturn) && ($tipo)){
                if ($tipo == 'error'){
                    return '<h4 style="border:2px solid;border-radius:5px;" class="box text-danger">'.$msgreturn.'</h4>';
                }
                if ($tipo == 'alert'){
                    return '<h4 style="border:2px solid;border-radius:5px;" class="box text-warning">'.$msgreturn.'</h4>';
                }
                if ($tipo == 'info') {
                    return '<h4 style="border:2px solid;border-radius:5px;" class="box text-info">' . $msgreturn . '</h4>';
                }
                if ($tipo == 'success') {
                    return '<h4 style="border:2px solid;border-radius:5px;" class="box text-success">' . $msgreturn . '</h4>';
                }
            }else{
                echo '';
            }
        }
        
        if(!isset($_SESSION)) { session_start(); }                                      // -------------------------------- INÍCIAR SESSÃO
        
        if (($url_atual == 'http://localhost/ecommerce/index.php') || ($url_atual == 'http://localhost/ecommerce/') || ($url_atual == 'http://localhost/ecommerce')):
            include_once 'controller/acessmodel.control.php';
        else:
            include_once '../controller/acessmodel.control.php';
        endif;

        
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.UTF-8', 'pt_BR.charset=ISO-8859-1', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        
        
        
        
        
        
        echo '<form method="POST"><input type="submit" value=">>>>> RESETAR ARRAYS <<<<<" name="aa"></form>';
        if(isset($_POST['aa'])):
            unset($_SESSION['idP']);
            unset($_SESSION['item']);
        endif;
        
        
        
        if(isset($_GET['acao']) && $_GET['acao'] == 'additemcar'):
            $iditem = (int)$_GET['iditem'];
            
            if(!isset($_SESSION['item'])):
                $_SESSION['item'] = array();
            endif;

            if(empty($_SESSION['item'][$iditem])):
                $_SESSION['item'][$iditem] = array($iditem,'nomeitem',1,'valoritem');
                header('location: compras.php');
            else:
                header('location: compras.php');
            endif;
        endif;
        
    ?>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo @$titulopage; ?></title>
    
        <?php
    if (($url_atual == 'http://localhost/ecommerce/index.php') || ($url_atual == 'http://localhost/ecommerce/') || ($url_atual == 'http://localhost/ecommerce')):
        ?>
        <link href="web/css/bootstrap.min.css" rel="stylesheet">
        <link href="web/css/font-awesome.min.css" rel="stylesheet">
        <link href="web/css/prettyPhoto.css" rel="stylesheet">
        <link href="web/css/price-range.css" rel="stylesheet">
        <link href="web/css/animate.css" rel="stylesheet">
            <link href="web/css/main.css" rel="stylesheet">
            <link href="web/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="web/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="web/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="web/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="web/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="web/images/ico/apple-touch-icon-57-precomposed.png">
        <?php
    else:
        ?>
        <link href="../web/css/bootstrap.min.css" rel="stylesheet">
        <link href="../web/css/font-awesome.min.css" rel="stylesheet">
        <link href="../web/css/prettyPhoto.css" rel="stylesheet">
        <link href="../web/css/price-range.css" rel="stylesheet">
        <link href="../web/css/animate.css" rel="stylesheet">
            <link href="../web/css/main.css" rel="stylesheet">
            <link href="../web/css/responsive.css" rel="stylesheet">
            
            <link rel="stylesheet" type="text/css" href="../web/js/jqzoom_ev-2.3/css/jquery.jqzoom.css">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="../web/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../web/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../web/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../web/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../web/images/ico/apple-touch-icon-57-precomposed.png">
        <?php
    endif;
        ?>
    