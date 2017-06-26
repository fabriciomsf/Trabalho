 <?php 
 
 include "./header.php"; 
 
 if($_GET){
     $dd = $_GET;
     
     $usuario->recuperaSenha($dd['email']);
 }
 ?>

<body>

    <!-- Navigation -->


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Formulário de Recuperação de Senha
                    <small>Acesso as informações dos clientes</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Clínicas Médicas</a>
                    </li>
                    <li class="active">Recuperar Senha</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->


        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-8">
                <h3>Acesse sua conta</h3>
                <form class="form-horizontal" action="recupera_senha.php" method="get">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                            Informe seu E-mail cadastrado para que possamos lhe enviar uma nova senha!
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Recuperar Senha</button>
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
