<?php

include_once "header.php";
include_once "class/classServicos.php";
include_once "class/classCliente.php";

if(!$usuario->verificaLogin()){
    echo "<script>history.back();</script>";

}
$cliente = new classCliente();
$servico = new classServicos();

if($_GET){
    $get = $_GET;
 
    //$cliente->buscaDadosCliente($get['cliente']);
    $servico->buscaServicos($get['servico']);
}
if($_POST){
    ($servico->getEstatusServ() == 'A')?$estatus = 'I':$estatus = 'A';
    
    $servico->desativaServico($servico->getidServicosServ(), $estatus);
}



?>

<body>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ativa/Desativa Vinculo
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a>
                </li>
                <li class="active">Ativa/Desativa Vinculo</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <!-- Sidebar Column -->
        <div class="col-md-3">
            <?php include_once "menuUserCli.php"; ?>
        </div>
        <!-- Content Column -->
        <div class="col-md-9">
<!--            <h2>Bem vindo --><?php //echo $usuario->getNome(); ?><!--</h2>-->
            <!-- Contact Form -->
            <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->

                    <h3>Por favor preencha os dados abaixo</h3>
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="inputNome" class="col-sm-2 control-label">Clínicas</label>
                            <div class="col-sm-10">
                               <select name="cliente" class="form-control">
                                   <option><?=$servico->getNomeClienteServico();?></option>
                                   
                               </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputNome" class="col-sm-2 control-label">Especialidades</label>
                            <div class="col-sm-10">
                               <select name="servico" class="form-control">
                                   <option><?=$servico->getNomeServico();?></option>
                                   
                               </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Descrição</label>
                            <div class="col-sm-10">
                                <textarea id="inputEmail3" disabled="disabled" class="form-control" maxlength="255" name="desc" rows="3"><?=$servico->getdescricaoServ();?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <!--                      <div class="checkbox">
                                                        <label>
                                                          <input type="checkbox"> Me lembre
                                                        </label>
                                                      </div>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <button type="submit" class="btn btn-danger">Ativa/Desativa</button>
                            </div>
                        </div>
                    </form>

            <!-- /.row -->
        </div>
    </div>
    <!-- /.row -->

    <?php include_once "footer.php"; ?>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
