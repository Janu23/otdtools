<?php
    session_start();
    /* Informa o nível dos erros que serão exibidos */
    error_reporting(E_ALL);
    /* Habilita a exibição de erros */
    ini_set("display_errors", 1);
    require_once '../../config/Template.php';
    $template = new Template();
    $template->render('filter.tpl.php');

?>