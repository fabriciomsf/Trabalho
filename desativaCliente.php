<?php

include_once "header.php";
include_once "class/classCliente.php";

if(!$usuario->verificaLogin()){
    echo "<script>history.back();</script>";

}

$cliente = new classCliente();

if($_GET){
    $get = $_GET;
 
    $cliente->buscaDadosCliente($get['cliente']);  
}

if($_POST){
    ($cliente->getEstatus() == 'A')?$estatus = 'I':$estatus = 'A';

    $cliente->alteraCliente($estatus,$cliente->getIdCliente(),$usuario->getIdUser());

    echo "<script> window.location.href = 'listaLoja.php';</script>";
}


/*if($cliente->getEstatus() == 'A'){
    */?><!--
    <p class='bg-success'>
        <div class='alert alert-info alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
           <strong><?/*=$cliente->getNomeCli();*/?></strong> está ativa
        </div>
    </p>
<?php
/*}else{
*/?>
<p class='bg-success'>
        <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
           <strong><?/*=$cliente->getNomeCli();*/?></strong> está Inativa
        </div>
    </p>
--><?php
/*}*/
?>

<body>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ativa/Desativa Clinica
                <small>Ativa/Desativa Clínica Cadastrada </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a>
                </li>
                <li class="active">Ativa/Desativa Clínica Cadastrada </li>
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
                    <form class="form-horizontal" action="desativaCliente.php" method="post">
                        <div class="form-group">
                            <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" maxlength="55" value="<?=$cliente->getNomeCli();?>" name="nome" id="inputNome" placeholder="Ex: AutoEletrica FriCar">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Endereço</label>
                            <div class="col-sm-6">
                                <input type="text" disabled class="form-control" maxlength="50" value="<?=$cliente->getEnd();?>" name="end" id="inputEmail3" placeholder="Ex: Rua Fortaleza">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Número</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" maxlength="4" value="<?=$cliente->getNum();?>" name="num" id="inputEmail3" placeholder="Ex:18">
                            </div>
                            <label for="inputEmail3" class="col-sm-1 control-label">Bairro</label>
                            <div class="col-sm-3">
                                <input type="text" disabled class="form-control" maxlength="15" value="<?=$cliente->getBairro();?>" name="bairro" id="inputEmail3" placeholder="Ex: Campo Grande">
                            </div>
                            <label for="inputEmail3" class="col-sm-1 control-label">CEP</label>
                            <div class="col-sm-3">
                                <input type="text" disabled class="form-control" maxlength="9" value="<?=$cliente->getCep();?>" name="cep" id="inputEmail3" placeholder="Ex: 99999-999">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Telefone</label>
                            <div class="col-sm-4">
                                <input type="text" disabled class="form-control" maxlength="10" value="<?=$cliente->getTel();?>" name="tel" id="inputEmail3" placeholder="Ex: 9999-9999">
                            </div>

                            <label for="inputEmail3" class="col-sm-1 control-label">Celular</label>
                            <div class="col-sm-4">
                                <input type="text" disabled class="form-control" maxlength="11" value="<?=$cliente->getCel();?>" name="cel" id="inputEmail3" placeholder="Ex: 99999-9999">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Descrição</label>
                            <div class="col-sm-10">
                                <textarea id="inputEmail3" disabled class="form-control" maxlength="255" name="desc" rows="3"><?=$cliente->getDesc();?></textarea>
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
                                <input type="hidden" value="1" name="des">
                                <button type="submit" class="btn btn-primary">Ativa/Desativa Clínica</button>
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
