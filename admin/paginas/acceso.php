
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CRUD</title>

    <!-- Bootstrap Core CSS -->
    <link href="css3/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css3/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       Menu de CRUD
                    </a>
                </li>
                <li>
                    <a href="../tablas/clientes/clientes.php">Clientes</a>
                </li>
                <li>
                    <a href="../tablas/marcas/marca.php">Marcas</a>
                </li>
                <li>
                    <a href="../tablas/modelos/modelos.php">Modelos</a>
                </li>
                <li>
                    <a href="../tablas/registros/registros.php">Registros</a>
                </li>



            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
               <div class="container">
      <div class="header">
        <nav>
          <ul class="nav nav-pills pull-right">
          <!--
            <li role="presentation" class="active"><a href="#">Inicio</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#"><span id="IL_AD6" class="IL_AD">Contact</span></a></li>
            -->
            <li role="presentation" class="active"><a href="logout.php">Logout</a></li>
          </ul>
        </nav>
      </div>





    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js3/bootstrap.min.js"></script>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js3/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js3/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</div>
</body>

</html>
