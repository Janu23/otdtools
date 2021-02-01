<?php include('header.tpl.php'); ?>
<body>
   <!-- As a heading -->
   <nav class="navbar bg-dark navbar-dark">
  <span class="navbar-brand mb-0 h1"><?php echo strtoupper ("Planilha ".$_SESSION['tabela']); ?></span>
    </nav>
    <nav aria-label="breadcrumb bg-white">
    <ol class="breadcrumb bg-white">
         <li class="breadcrumb-item"><a href="filter.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo "Planilha ".$_SESSION['tabela']; ?></li>
    </ol>
    </nav>
        <div id="container-tabela">
        <div class="alert alert-primary col-sm-2" id="msg-desempenho" role="alert">
         <?php echo "Acumulado: ".$this->count[0]; ?>
        </div>
        <div class="col-sm-1"></div>

        <div class="alert alert-warning col-sm-2" id="msg-desempenho" role="alert">
        <?php echo "Fichas Restantes: ".($this->countRest[0]-$this->count[0]); ?>
        </div>
            <table class="table table-responsive hover" id="tabela">
                <thead class="thead-dark">
                    <tr>
                        <th>Status</th>
                        <th>Código Ficha</th>
                        <th>Nome</th>
                        <th>Km</th>
                        <th>Sentido</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php  if($this->tableArray) foreach($this->tableArray as $dados) { ?>
                    <tr>
                        <?php    
                            if ($dados['status']!=NULL){
                                $ok = '<span><img src="../../img/icons/ok.png" width="20px"/></span>';
                            }else {
                                $ok = '';
                            }
                         ?>
                        <td><?php echo $ok; ?></td>
                        <td><?php echo $dados['codFicha']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['km']; ?></td>
                        <td><?php echo $dados['sentido']; ?></td>
                        <td><a href="edit.php?id=<?php echo $dados['id']; ?>" class="btn btn-secondary ">Editar</a></td>
                    </tr>
                <?php 
                    }
                ?>
                </tbody>
            </table>
        
        </div>
<?php include('footer.tpl.php'); ?>