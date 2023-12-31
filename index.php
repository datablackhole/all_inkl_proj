<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">











</head>
<body class="hold-transition sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">
    <textarea placeholder="or type or paste CSV text here" style="width: 300px;" class="d-none" id="csv_text"></textarea>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/index3.html" class="brand-link">
      <!-- <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">ALL INKL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">MySQL Data</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" id="collapseFormBtn" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    </div>
            </div>

            <div class="card-body">
            <form class="form-horizontal" id="inpForm">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">MySQL Host</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control"  name="host" id="inputEmail3" placeholder="Host">
                        </div>
                        <label for="inputEmail3" class="col-sm-2 col-form-label">MySQL Database</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control"  name="database" id="inputEmail3" placeholder="Database">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">MySQL Username</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control"  name="username" id="inputPassword3" placeholder="Username">
                        </div>
                        <label for="inputPassword3" class="col-sm-2 col-form-label">MySQL Password</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control"  name="password" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <h3 class="card-title">MySQL Query </h3>
                    <textarea name="sql" id="" class="w-100" rows="10"></textarea>
                    <button type="button" class="btn btn-info float-right" onclick="execSQL()" >Search</button>
                </div>

            </form>
        </div>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">View </h3>
                
                <select name="locale" id="locale" class="ml-3">
                    <option value="en" selected>English</option>
                    <option value="fr">French</option>
                    <option value="de">German</option>
                </select>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    </div>
            </div>

            <div class="card-body">
                <div id="output_table" style="margin: 10px;"></div>
                <div id="buttons_section"></div>

                <div id="output" style="margin: 10px;"></div>
            </div>
            
        </div>
                
                

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>

<!-- external libs from cdnjs -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/4.1.2/papaparse.min.js"></script>
<script src="https://cdn.plot.ly/plotly-basic-latest.min.js"></script><style id="plotly.js-style-global"></style>

<!-- PivotTable.js libs from ../dist -->
<link rel="stylesheet" type="text/css" href="/plugins/pivottable/pivot.css">
<script type="text/javascript" src="/plugins/pivottable/pivot.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.23.0/pivot.fr.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.23.0/pivot.de.min.js"></script>
<script type="text/javascript" src="/plugins/pivottable/d3_renderers.js"></script>
<script type="text/javascript" src="/plugins/pivottable/plotly_renderers.js"></script>
<script type="text/javascript" src="/plugins/pivottable/export_renderers.js"></script>



<link href="https://cdn.datatables.net/v/bs4-4.6.0/dt-1.13.8/datatables.min.css" rel="stylesheet">
 
<script src="https://cdn.datatables.net/v/bs4-4.6.0/dt-1.13.8/datatables.min.js"></script>

<!-- Include the external JS file -->
<script src="app.js?v=<?php echo time();?>"></script>



</body>
</html>
