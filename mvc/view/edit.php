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
    if (isset($_SESSION['tabela']) && $_SESSION['tabela']=="acesso"){
        $dispositivo = new Acesso();
    } else if (isset($_SESSION['tabela']) && $_SESSION['tabela']=="ocupacao"){
        $dispositivo = new Ocupacao();
    }else {
        echo "Houve algum problema na seleção da tabela!";
    }
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $template->arrayFicha = $dispositivo->find($id);
    $template->planilha = $_SESSION['tabela'];
    $template->count = $dispositivo->countParam("fotos_".$_SESSION['tabela'],"codFicha",$id);
    $template->fotoArray = $dispositivo->findByFilter("fotos_".$_SESSION['tabela'],"codFicha",$id);
    $template->render('edit.tpl.php');

?>