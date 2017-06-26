<?php

include_once "header.php";
include_once "class/classCliente.php";

$cliente = new classCliente();

if(!$usuario->verificaLogin()){
    echo "<script>history.back();</script>";

}
/*if($cliente->verificaCliente($usuario->getIdUser())){
    echo "<script>history.back();</script>";
}*/

if($_POST){
    $dd = $_POST;

    if(!$dd['nome'] || !$dd['end'] || !$dd['num'] || !$dd['bairro'] || !$dd['cep'] || !$dd['tel'] || !$dd['cel'] || !$dd['desc']){
        ?>
        <p class='bg-success'>
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            Por favor <strong>preencha todos os dados</strong>.
                        </div>
                </p>
    <?php
    }else{

      
//    echo $cliente->imageUpload($_FILES['arquivo']['name'], $_FILES["arquivo"]["error"], $_FILES['arquivo']['tmp_name'], 'clientes');
       
if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0){
    $image1 = $cliente->imageUpload($_FILES['arquivo']['name'],$_FILES['arquivo']['tmp_name'],'clientes');
}else{
    $image1 = NULL;
}

if(isset($_FILES['arquivo2']['name']) && $_FILES["arquivo2"]["error"] == 0){
    $image2 = $cliente->imageUpload($_FILES['arquivo2']['name'],$_FILES['arquivo2']['tmp_name'],'clientes');
}else{
    $image2 = NULL;
}

if(isset($_FILES['arquivo3']['name']) && $_FILES["arquivo3"]["error"] == 0){
    $image3 = $cliente->imageUpload($_FILES['arquivo3']['name'],$_FILES['arquivo3']['tmp_name'],'clientes');
}else{
    $image3 = NULL;
}

    $cliente->cadCliente($dd['nome'],$dd['end'],$dd['num'],$dd['bairro'],$dd['cep'],$dd['tel'],$dd['cel'],$dd['desc'],$usuario->getIdUser(),$image1,$image2,$image3);
    }
}

?>

<body>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastrar Clínicas
                <small>Àrea de Cadastro de Clínicas</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a>
                </li>
                <li class="active">Cadastro de Clínicas</li>
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
                    <form class="form-horizontal" action="cadCliente.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" name="nome" id="inputNome" placeholder="Ex: Clinica médica">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Endereço</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="" name="end" id="inputEmail3" placeholder="Ex: Rua Fortaleza">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Número</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" value="" name="num" id="num" placeholder="Ex:18">
                            </div>
                            <label for="inputEmail3" class="col-sm-1 control-label">Bairro</label>
                            <div class="col-sm-3">
                                <select class="form-control" value="" name="bairro" id="inputEmail3">
                                    <?=$cliente->comboBairro();?>
                                </select>
                            </div>
                            <label for="inputEmail3" class="col-sm-1 control-label">CEP</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" value="" name="cep" id="cep" placeholder="Ex: 99999-999">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Telefone</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="" name="tel" id="tel" placeholder="Ex: 9999-9999">
                            </div>

                            <label for="inputEmail3" class="col-sm-1 control-label">Celular</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="" name="cel" id="cel" placeholder="Ex: 99999-9999">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Descrição</label>
                            <div class="col-sm-10">
                                <textarea id="inputEmail3" class="form-control" name="desc" rows="3"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Imagem</label>
                            <div class="col-sm-7">
                                <input type="file" class="form-control" name="arquivo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <input type="file" class="form-control" name="arquivo2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <input type="file" class="form-control" name="arquivo3">
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
                                <button type="submit" class="btn btn-primary">Cadastrar Clínica</button>
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
<script src="js/jquery.maskedinput.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
jQuery(function($){
   $("#num").mask("99");
   $("#tel").mask("9999-9999");
   $("#cel").mask("99999-9999");
   $("#cep").mask("99999-999");
});
</script>
</body>

</html>
