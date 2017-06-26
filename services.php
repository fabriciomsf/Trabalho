 <?php include "./header.php"; ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

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



    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Busca de Especialidades
                    <small>Serviços Oferecidos pelo Sistema</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Painel de Serviços</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Image Header -->
<!--        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="http://placehold.it/1200x300" alt="">
            </div>
        </div>-->
        <!-- /.row -->

        <!-- Service Panels -->
        <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Painel de Serviços oferecidos </h2>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-search fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Busca de Especialidades Médicos</h4>
                        <p>Encontre a clínica mais perto de você.</p>
                        <p>Aqui você encontra as melhores especialidades médicas, com mais facilidades e confiança.</p>
                        <br>
<!--                        <a href="#service-one" class="btn btn-primary">Leia Mais</a>-->
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-stethoscope fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Avaliação Personalizada</h4>
                        <p>Avalie os médicos de forma trasnparente e direta, ajude outros usuários.</p>
                        
                        <p>Com isso você poderá indicar a seus amigos, familiares, confiando nas melhores clínicas oferecidas pelo Sistema.</p>
<!--                        <a href="#service-two" class="btn btn-primary">Leia Mais</a>-->
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Melhores Preços</h4>
                        <p>Compare preços entre diversos clínicas  próximos a sua residência.</p>
                        <p>Confiança é tudo para o cliente, por isso oferecemos os melhores especialistas com preços acessiveis a todos os níveis de público, além de qualidade exemplar.</p>
<!--                        <a href="#service-three" class="btn btn-primary">Leia Mais</a>-->
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Base de Dados Dinâmica</h4>
                        <p>Base de dados atualizada em tempo real.</p>
                        <p>Confiança e qualidade dos seus Dados.Agilidade e Rapidez com todo controle das informações.</p>
                        
                        <br>
<!--                        <a href="#" class="btn btn-primary">Learn More</a>-->
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Tabs -->
<!--        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Serviços Oferecidos</h2>
            </div>
            <div class="col-lg-12">

                <ul id="myTab" class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-search"></i> Busca de Especialidades Médicos</a>
                    </li>
                    <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-plus-circle"></i> Avaliação Personalizada</a>
                    </li>
                    <li class=""><a href="#service-three" data-toggle="tab"><i class="fa fa-money"></i> Melhores Preços</a>
                    </li>
                    <li class=""><a href="#service-four" data-toggle="tab"><i class="fa fa-database"></i> Base de Dados Dinâmica</a>
                    </li>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="service-one">
                        <h4>Service One</h4>
                        <p>Aqui você encontra os melhores médicos, com mais facilidades e confiança.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                    </div>
                    <div class="tab-pane fade" id="service-two">
                        <h4>Service Two</h4>
                        <p>Com um sistema super atualizado, você pode avaliar cada Clínica e especialidade oferecida pelo nosso Sitema.</p>
                        <p>Com isso você poderá indicar a seus amigos e confiar nas melhores clínicas oferecidas pelo Sistema.</p>
                    </div>
                    <div class="tab-pane fade" id="service-three">
                        <h4>Service Three</h4>
                        <p>Através de uma pesquisa, nosso sistema oferece os melhores preços e custo beneficios aos nossos clientes.</p>
                        <p>Confiança pe tudo para o cliente, por isso oferecemos preços acessivel a todos os tipos de públicos.Oferecemos além dos melhores preços, um pacote totalmente adequado a sua necessidade.</p>
                    </div>
                    <div class="tab-pane fade" id="service-four">
                        <h4>Service Four</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                    </div>
                </div>

            </div>
        </div>-->

        <!-- Service List -->
        <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<!--        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Service List</h2>
            </div>
            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Service One</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                    </div>
                </div>
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Service Two</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                    </div>
                </div>
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-support fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Service Three</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Service Four</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                    </div>
                </div>
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-bomb fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Service Five</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                    </div>
                </div>
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-bank fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Service Six</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-paper-plane fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Service Seven</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                    </div>
                </div>
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-space-shuttle fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Service Eight</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                    </div>
                </div>
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-recycle fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Service Nine</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       <?php include "./footer.php"; ?>


    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
