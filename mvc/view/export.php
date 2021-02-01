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
    $acesso = new Acesso();
    $template->acessoArray = $acesso->findAll();
    $template->acessoFotosArray = $acesso->getTable("fotos_acesso");
    $ocupacao = new Ocupacao();
    $template->ocupacaoArray = $ocupacao->findAll();
    $template->ocupacaoFotosArray = $ocupacao->getTable("fotos_ocupacao");

    $template->render('export.tpl.php');

?>