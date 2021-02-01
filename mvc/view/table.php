<?php
    session_start();
    /* Informa o nível dos erros que serão exibidos */
    error_reporting(E_ALL);
    /* Habilita a exibição de erros */
    ini_set("display_errors", 1);
    require_once '../model/Acesso.php';
    require_once '../model/Ocupacao.php';
    require_once '../../config/Template.php';
    $template = new Template();

    if (isset($_POST['tabela'])){ $_SESSION['tabela'] = $_POST['tabela'];}
    if (isset($_POST['filtro'])){ $_SESSION['filtro'] = $_POST['filtro'];}
    if (isset($_POST['inicioTrecho'])){ $_SESSION['inicioTrecho'] = $_POST['inicioTrecho'];}
    if (isset($_POST['finalTrecho'])){ $_SESSION['finalTrecho'] = $_POST['finalTrecho'];}
    
    /*Torna a ordem de inicio do trecho irrelevante */
    if (isset($_SESSION['inicioTrecho']) && isset($_SESSION['finalTrecho'])){
        if ($_SESSION['inicioTrecho']>$_SESSION['finalTrecho']){
            $aux = $_SESSION['finalTrecho'];
            $_SESSION['finalTrecho'] = $_SESSION['inicioTrecho'];
            $_SESSION['inicioTrecho'] = $aux;
        }
    }

    if (isset($_SESSION['tabela']) && $_SESSION['tabela']=="acesso"){
        $dispositivo = new Acesso();
    } else if (isset($_SESSION['tabela']) && $_SESSION['tabela']=="ocupacao"){
        $dispositivo = new Ocupacao();
    }else {
        echo "Houve algum problema na seleção da tabela!";
    }

    if ($_SESSION['inicioTrecho']=="" &&  $_SESSION['finalTrecho']==""){
       $template->tableArray =  $dispositivo->findAll();
    }else if ($_SESSION['inicioTrecho']=="" ||  $_SESSION['finalTrecho']==""){
        if ($_SESSION['inicioTrecho']!=""){
            $template->tableArray =  $dispositivo->findByFilter($_SESSION['tabela'],$_SESSION['filtro'],$_SESSION['inicioTrecho']);
        } 
        if ($_SESSION['finalTrecho']!=""){
            $template->tableArray =  $dispositivo->findByFilter($_SESSION['tabela'],$_SESSION['filtro'],$_SESSION['finalTrecho']);
        }
    }else{
        $template->tableArray =  $dispositivo->findInterval($_SESSION['tabela'],$_SESSION['filtro'],$_SESSION['inicioTrecho'],$_SESSION['finalTrecho']);
    }    
    $template->postArray = $_POST;
    $template->count = $dispositivo->countParam($_SESSION['tabela'],"status","1");
    $template->countRest = $dispositivo->count();
    //var_dump($_POST);
    //var_dump($template->tableArray);
    $template->render('table.tpl.php');

?>