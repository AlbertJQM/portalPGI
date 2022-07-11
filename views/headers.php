<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PGI - Postgrado en Informática</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" type="image/x-icon" href="../assets/images/logopgi-128x123-1.png">
        <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../public/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="../public/css/AdminLTE.min.css">
        <link rel="stylesheet" type="text/css" href="../public/css/_all-skins.min.css">
        <link rel="apple-touch-icon" type="image/x-icon" href="../public/img/apple-touch-icon.png">
        <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
        <link rel="stylesheet" type="text/css" href="../public/datatables/buttons.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="../public/datatables/responsive.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/web/assets/mobirise-icons2/mobirise2.css">
        <link rel="stylesheet" type="text/css" href="../assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
          <header class="main-header">
            <a href="" class="logo">
              <span class="logo-mini"><b>PGI</b></span>
              <span class="logo-lg"><b>Sistema PGI</b></span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Navegación</span>
              </a>
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="mobi-mbri mobi-mbri-user-2 mbr-iconfont">
                      <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="user-header">
                        <p>
                        </p>
                      </li>
                      <li class="user-footer">
                        <div class="pull-right">
                          <a href="../ajax/personal.php?op=salir" class="btn btn-default btn-flat">Salir</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>
          </header>
          <aside class="main-sidebar">
            <section class="sidebar">
              <ul class="sidebar-menu">
                <li class="header"></li>
                <li id="siNoticias">
                  <a href="noticia.php">
                    <span class="mobi-mbri mobi-mbri-contact-form mbr-iconfont"></span>
                    <span>Noticias</span>
                  </a>
                </li>
                <li id="siPersonal">
                  <a href="personal.php">
                    <span class="mobi-mbri mobi-mbri-users mbr-iconfont">
                    <span>Personal</span>
                  </a>
                </li>
              </ul>
            </section>
          </aside>