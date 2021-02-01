<?php include('header.tpl.php'); ?>
<body>
   <!-- As a heading -->
   <nav class="navbar bg-dark navbar-dark">
  <span class="navbar-brand mb-0 h1">Filtrar Dados</span>
    </nav>
    <nav aria-label="breadcrumb bg-white">
    <ol class="breadcrumb bg-white">
        <li class="breadcrumb-item active" aria-current="page">Filtrar Dados</li>
    </ol>
    </nav>
    <div id="container-tabela">
            <form action="table.php" method="post"> 
                <fieldset>
                     <div class="col-md-12">
                        <div class="form-group">
                        <h4 >Selecione uma tabela:</h4>
                             <input type="radio" id="acesso" name="tabela" value="acesso" checked>
                            <label for="acesso">Acesso</label><br>
                            <input type="radio" id="ocupacao" name="tabela" value="ocupacao">
                            <label for="ficha">Ocupação</label><br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Filtrar por:</label>
                        <select class="form-control select2" name="filtro" id="filtro" style="width: 100%;">
                            <option value="id">Ficha</option>
                            <option value="km" selected>Km</option>
                        </select>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Deixando os campos de entrada(abaixo) em branco, serão retornados todos os elementos do filtro selecionado.</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">Início Seleção</span>
                            <input id="inicioTrecho" name="inicioTrecho" class="form-control" type="text" placeholder="Exemplo filtro km: 270,7">
                            </div>
                           
                        </div>           
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">Final Seleção</span>
                            <input id="finalTrecho" name="finalTrecho" class="form-control" type="text" placeholder="Exemplo filtro ficha: 10">
                            </div>
                            <br>
                        </div>           
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button id="filtrar" name="filtrar" value="filtrar" class="btn btn-success" type="submit">Buscar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            <br><hr>
            <div class="col-md-12">
            <label>Clique no botão abaixo ao final do dia para baixar todas as planilhas e envie-as para o escritório.</label>
            <a href="export.php" class="btn btn-primary btn-lg btn-block mb">Exportar todos os dados</a>
            </div>
        </div>
<?php include('footer.tpl.php'); ?>