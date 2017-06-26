<?php 

include "./header.php";

if($usuario->verificaLogin()){
    echo "<script>history.back();</script>";

}

if($_POST){
    $dd = $_POST;
    
    if(!$dd['nome'] || !$dd['email'] || !$dd['senha']){
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
    
    $senha = md5($dd['senha']);
    
    $usuario->cadUsuario($dd['nome'], $dd['email'], $senha);
    

    }
}


?>
<body>

    <!-- Navigation -->


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Formulário de Cadstro
                    <small>Acesso as informações dos clientes</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Clínicas Médicas</a>
                    </li>
                    <li class="active">Cadastro</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->


        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-8">
                <h3>Crie uma conta</h3>
                <form class="form-horizontal" action="cadastro.php" method="post">
                    <div class="form-group">
                    <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome" id="inputNome" placeholder="Nome Completo">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="senha" id="inputPassword3" placeholder="Password">
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
                      <button type="submit" class="btn btn-primary">Cadastrar</button>
                      <input type="hidden" name="acao" value="user">
                        <a onclick="history.back()" class="btn btn-danger">Voltar</a>
                    </div>
                  </div>
                </form>
            </div>

        </div>
        <!-- /.row -->




<?php include "./footer.php"; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

</body>

</html>
