<?php
    ob_start();//solução para o problema de cabeçalho export excel não carregado 
    require('../model/Acesso.php');
    require('../model/Ocupacao.php');
    session_start();

    if (isset($_POST['salvar']) && $_POST['salvar'] === 'salvar'){
        if (isset($_POST['tabela']) && $_POST['tabela']=="acesso"){
            $dispositivo = new Acesso();
        } else if (isset($_POST['tabela']) && $_POST['tabela']=="ocupacao"){
            $dispositivo = new Ocupacao();
        }else {
            echo "Houve algum problema na seleção da tabela!";
        }
        $nFotos = $dispositivo->countParam("fotos_".$_POST['tabela'],"codFicha",$_POST['id']);
        echo "Nft:".$nFotos[0];
         //Criar diretórios 
        $diretorio = "../../fotos/".$_POST['tabela']."/".str_replace('/', '-', date("d/m/Y"));
        //$diretorio = "../../fotos/".$_POST['tabela'];
        if (!file_exists($diretorio)){
            mkdir($diretorio, 0777);
        }

        if (isset($_FILES ['foto']) && !empty($_FILES["foto"]["name"])){  
            $currentName = $_FILES ['foto']['name']; 
            $parts = explode(".",$currentName);
            $extension = array_pop($parts);
            $newName = $_POST['id']."_foto".$nFotos[0];
            $destination = "{$diretorio}/{$newName}.{$extension}";
            //echo ( "Arquivo:".$_FILES [ 'foto1_ficha'][ 'name' ]."\ n");
            //echo ( gettype ( $_FILES [ 'foto1_ficha' ] [ 'name' ]));
    
            if ( move_uploaded_file ( $_FILES ['foto']['tmp_name'] , $destination)) {
            // echo  "Arquivo 1 enviado com sucesso! \ n" ;
                $dispositivo->salvarFoto($_POST['id'],"{$newName}.{$extension}",str_replace('/', '-', date("d/m/Y")),$_POST['observacao']);
                $dispositivo->updateParam($_POST['id'],"status","1");
                //$dispositivo->updateParam($_POST['id'],"observacao",$_POST['observacao']);
                $_SESSION['resultadoOp'] = 1;
            } 
            else {
            // echo  "Erro, o arquivo 1 nao enviado! \ n" ;
                $_SESSION['resultadoOp'] = 0;
            }


        }
        header("Location: ../view/edit.php?id={$_POST['id']}");
        exit();
    }
    ob_end_flush();  
?>