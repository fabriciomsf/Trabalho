<?php

include_once "header.php";

if(!$usuario->verificaLogin()){
    echo "<script>history.back();</script>";
}else{
    if($_POST){
        $dd = $_POST;
        if(!$dd['senha'] || !$dd['reSenha']){
            ?>
                <p class='bg-success'>
                                <div class='alert alert-danger alert-dismissible' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    Por favor preencha <strong>todos os campos</strong>.
                                </div>
                        </p>
            <?php
        }else{
            $usuario->alterarSenha($dd['senha'],$dd['reSenha'],$usuario->getIdUser());
        }
    }
}

?>

<body>
<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Alterar Senha
                    <small>Alterar Senha de Usuários</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Alterar Senha</li>
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
                <!--<h2>Bem vindo <?php echo $usuario->getNome(); ?></h2>
                 Contact Form -->
                <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
                <div class="row">
                    <div class="col-md-8">
                        <h3>Deseja alterar sua senha?</h3>
                        <form class="form-horizontal" action="userAlterarSenha.php" method="post">
                            <div class="form-group">
                                <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control"  name="senha" id="inputSenha" placeholder="Insira uma nova senha...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSenha" class="col-sm-2 control-label">Reptia Senha</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control"  name="reSenha" id="inputSenha" placeholder="Repita a senha...">
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
                                    <button type="submit" class="btn btn-primary">Alterar Senha</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
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
