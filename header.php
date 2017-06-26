<?php

include "./class/classUsuario.php";

$usuario = new classUsuario();

   
?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Especialidades Médicas</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="background-image:url('img/index/logoprincipal.png');">  </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="text-align: center">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.php">Sobre</a>
                    </li>
                    <li>
                        <a href="services.php">Painel de Serviços</a>
                    </li>
                    <li>
                        <a href="contato.php">Contato</a>
                    </li>
                    <?php if(!$usuario->verificaLogin()){ ?>
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                        <?php
                        }else{
                           ?>
                           <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $usuario->getNome(); ?> <b
                                       class="caret"></b></a>
                               <ul class="dropdown-menu">
                                   <li>
                                       <a href="userPerfil.php">Perfil</a>
                                   </li>
                                   <!--<li>
                                       <a href="userAlterarSenha.php">Alterar Senha</a>
                                   </li>
                                   <li>
                                       <a href="cadCliente.php">Cadastrar Loja</a>
                                   </li>
                                   <li>
                                       <a href="portfolio-4-col.html">4 Column Portfolio</a>
                                   </li>-->
                                   <li>
                                       <a href="logout.php">Logout</a>
                                   </li>
                               </ul>
                           </li>
                           <?php
                       }
                    ?>
<!--                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-home-1.html">Blog Home 1</a>
                            </li>
                            <li>
                                <a href="blog-home-2.html">Blog Home 2</a>
                            </li>
                            <li>
                                <a href="blog-post.html">Blog Post</a>
                            </li>
                        </ul>
                    </li>-->
<!--                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="full-width.html">Full Width Page</a>
                            </li>
                            <li>
                                <a href="sidebar.html">Sidebar Page</a>
                            </li>
                            <li>
                                <a href="faq.html">FAQ</a>
                            </li>
                            <li>
                                <a href="404.html">404</a>
                            </li>
                            <li>
                                <a href="pricing.html">Pricing Table</a>
                            </li>
                        </ul>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>