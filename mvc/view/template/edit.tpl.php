<?php include('header.tpl.php'); ?>
<body>
   <!-- As a heading -->
   <nav class="navbar bg-dark navbar-dark">
  <span class="navbar-brand mb-0 h1"><?php echo strtoupper ("Planilha ".$this->planilha); ?></span>
    </nav>
    <nav aria-label="breadcrumb bg-white">
    <ol class="breadcrumb bg-white">
         <li class="breadcrumb-item"><a href="filter.php">Home</a></li>
         <li class="breadcrumb-item"><a href="table.php"><?php echo "Planilha ".$this->planilha; ?></a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
    </ol>
    </nav>
    <div class="container">
        <?php if (isset($_SESSION['resultadoOp']) && $_SESSION['resultadoOp']==1){ ?>
            <div class="alert alert-success" role="alert">
            &nbsp; Foto Adicionada! &nbsp; <span><img src="../../img/icons/ok.png" width="20px"/></span>
            </div>
        <?php }?>
        <?php if (isset($_SESSION['resultadoOp']) && $_SESSION['resultadoOp']==0){ ?>
            <div class="alert alert-danger" role="alert">
            &nbsp; Erro ao salvar foto! &nbsp; <span><img src="../../img/icons/error.png" width="20px"/></span>
            </div>
        <?php }?>
        <div class="col-md-12">
            <b>Código: </b><?php echo $this->arrayFicha[1]."</br>"; ?>
            <b>Nome: </b><?php echo $this->arrayFicha[2]."</br>"; ?>
            <b>Km: </b><?php echo $this->arrayFicha[3]."</br>"; ?>
            <b>Sentido: </b><?php echo $this->arrayFicha[4]."</br></br>"; ?>
            <hr>
        </div>
        <div class="col-md-12">
            <b>Total de fotos adicionadas: </b><?php echo $this->count[0]."</br>"; ?>
            <hr>
        </div>
       
        <?php  if(count($this->fotoArray)>0){
            echo '<div class="col-md-12"><b>Prévia Fotos Salvas</b></div>';
            echo '<br><div class="col-md-3">';
             foreach($this->fotoArray as $foto) { 
             echo '<img src="../../fotos/'.$this->planilha.'/'.$foto['data'].'/'.$foto['nome'].'" width="100px" style="padding-left: 10px;"/>'; 
            } 
            echo '</div>';
        } ?>
        
        <div class="col-md-12">
        <hr>
           <form  action="../controller/controller.php" method="post" enctype="multipart/form-data" class="form-horizontal">
           <fieldset> 
                <input type="hidden" name="tabela" value="<?php echo $this->planilha;?>">
                 <input type="hidden" name="id" value="<?php echo $this->arrayFicha[0];?>">
                 <div class="col-md-12">
                    <label class="col-sm-2 control-label" for="foto">Adicione a foto<span><img src="../../img/icons/camera.png" width="30px"/></span></label>  
                    <div class="col-sm-2">
                        <input id="foto" name="foto" type="file" accept="image/*">  
                 </div>
                </div>
                <div class="col-md-12">
                <hr>
                <label class="col-sm-2 control-label" for="observacao">Observações</label>  
                <div class="col-sm-8">
                     <textarea class="form-control" name="observacao" id="observacao" rows="3" maxlength="2000"></textarea>   
                </div>
                <div class="col-md-12">
                <hr>
                    <div class="form-group">
                        <button id="salvar" name="salvar" value="salvar" class="btn btn-success" type="submit">Salvar</button>
                    </div>
                </div>
                
            </div>
            </fieldset> 
            </form>
        </div>
    </div>
    <?php unset($_SESSION['resultadoOp']); ?>


<?php include('footer.tpl.php'); ?>