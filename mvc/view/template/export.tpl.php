<?php
ob_start();//solução para o problema de cabeçalho export excel não carregado 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body>
<?php

$arquivo = "acesso_ocupacao.xls";
    $html = ' ';
    $html .= '<table border="1">';
    $html .= '<tr><td colspan="6" align="center">Planilha Acesso</td></tr>';
    $html .='<tr>';
    $html .='<th>id</th>';
    $html .='<th>codFicha</th>';
    $html .='<th>nome</th>';
    $html .='<th>sentido</th>';
    $html .='<th>status</th>';
    $html .='</tr>';

    foreach ($this->acessoArray as $acesso){
        $html .='<tr>';
        $html .='<td>'.$acesso["id"].'</td>';
        $html .='<td>'.$acesso["codFicha"].'</td>';
        $html .='<td>'.$acesso["nome"].'</td>';
        $html .='<td>'.$acesso["sentido"].'</td>';
        $html .='<td>'.$acesso["status"].'</td>';
        $html .='</tr>';
    }
    $html .='</table>';
    
    $html .= '<table border="1">';
    $html .= '<tr><td colspan="6" align="center">Planilha Ocupacao</td></tr>';
    $html .='<tr>';
    $html .='<th>id</th>';
    $html .='<th>codFicha</th>';
    $html .='<th>nome</th>';
    $html .='<th>sentido</th>';
    $html .='<th>status</th>';
    $html .='</tr>';

    foreach ($this->ocupacaoArray as $ocupacao){
        $html .='<tr>';
        $html .='<td>'.$ocupacao["id"].'</td>';
        $html .='<td>'.$ocupacao["codFicha"].'</td>';
        $html .='<td>'.$ocupacao["nome"].'</td>';
        $html .='<td>'.$ocupacao["sentido"].'</td>';
        $html .='<td>'.$ocupacao["status"].'</td>';
        $html .='</tr>';
    }

    $html .='</table>';

    $html .= '<table border="1">';
    $html .= '<tr><td colspan="4" align="center">Planilha Fotos Acesso</td></tr>';
    $html .='<tr>';
    $html .='<th>id</th>';
    $html .='<th>codFicha</th>';
    $html .='<th>nome</th>';
    $html .='<th>data</th>';
    $html .='<th>observacao</th>';
    $html .='</tr>';

    foreach ($this->ocupacaoFotosArray as $ocupacaoFoto){
        $html .='<tr>';
        $html .='<td>'.$ocupacaoFoto["id"].'</td>';
        $html .='<td>'.$ocupacaoFoto["codFicha"].'</td>';
        $html .='<td>'.$ocupacaoFoto["nome"].'</td>';
        $html .='<td>'.$ocupacaoFoto["data"].'</td>';
        $html .='<td>'.$ocupacaoFoto["observacao"].'</td>';
        $html .='</tr>';
    }

    $html .='</table>';

    $html .= '<table border="1">';
    $html .= '<tr><td colspan="4" align="center">Planilha Fotos Ocupacao</td></tr>';
    $html .='<tr>';
    $html .='<th>id</th>';
    $html .='<th>codFicha</th>';
    $html .='<th>nome</th>';
    $html .='<th>data</th>';
    $html .='<th>observacao</th>';
    $html .='</tr>';

    foreach ($this->acessoFotosArray as $acessoFoto){
        $html .='<tr>';
        $html .='<td>'.$acessoFoto["id"].'</td>';
        $html .='<td>'.$acessoFoto["codFicha"].'</td>';
        $html .='<td>'.$acessoFoto["nome"].'</td>';
        $html .='<td>'.$acessoFoto["data"].'</td>';
        $html .='<td>'.$acessoFoto["observacao"].'</td>';
        $html .='</tr>';
    }

    $html .='</table>';

    // Configurações header para forçar o download
    header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
    header ("Content-Description: PHP Generated Data" );
    // Envia o conteúdo do arquivo                            
    echo $html;
    exit;  
    ob_end_flush();   
?>
	</body>
</html>