<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADS - Painel de Controle</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="painel-de-controle.php">ADS - Painel de Controle</a>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
			<!--
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
          </a>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
		-->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Configurações</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
          </div>
        </li>
		
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="painel-de-controle.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Visão Geral</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="gerenciar-usuarios.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Gerenciar Usuários</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-video"></i>
            <span>Gerenciar Equipamentos</span></a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Gráficos</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">
              <a href="painel-de-controle.php">Visão Geral</a>
            </li>
            <li class="breadcrumb-item active">Gerenciar Usuários</li>
          </ol>
		  
		  <!-- Novo Usuário -->
		  <div class="mb-3">
			  <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#cadastroModal">
				<i class="fas fa-2x fa-user-plus"></i>
				<span style="padding:10px">Cadastrar</span>
			  </a>
		  </div>

		  <!-- DataTables -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Lista de Usuários</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Usuário</th>
                      <th>Data de Criação</th>
					  <th>Último Login</th>
					  <th style="text-align:center">Editar</th>
					  <th style="text-align:center">Excluir</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nome</th>
                      <th>Usuário</th>
                      <th>Data de Criação</th>
					  <th>Último Login</th>
					  <th style="text-align:center">Editar</th>
					  <th style="text-align:center">Excluir</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Matheus Moraes</td>
                      <td>admin</td>
                      <td>2018-08-12 14:10:27</td>
					  <td>2018-08-12 14:10:27</td>
					  <td style="text-align:center">
						<a href="#">
							<i class="fas fa-lg fa-edit" style="color:green"></i>
						</a>
					  </td>
					  <td style="text-align:center">
						<a href="#">
							<i class="fas fa-lg fa-times-circle" style="color:Tomato"></i>
						</a>
					  </td>
                    </tr>  
					<tr>
                      <td>Test User</td>
                      <td>admin</td>
                      <td>2018-09-12 14:10:27</td>
					  <td>2018-08-12 14:10:27</td>
					  <td style="text-align:center">
						<a href="#">
							<i class="fas fa-lg fa-edit" style="color:green"></i>
						</a>
					  </td>
					  <td style="text-align:center">
						<a href="#">
							<i class="fas fa-lg fa-times-circle" style="color:Tomato"></i>
						</a>
					  </td>
                    </tr>  
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Última Atualização em 27/08/2018 às 11:59</div>

        </div>
		<!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © ADS 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
	
    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tem certeza?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecione "Sair" para terminar a sessão corrente.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="logout.php">Sair</a>
          </div>
        </div>
      </div>
    </div>
	
	<!-- Cadastro Modal -->
    <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Novo Usuário</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          
		  <div class="modal-body">
			<form>
				<div class="form-group">
				  <div class="form-group">
				  <div class="form-label-group">
					<input type="email" id="inputNome" class="form-control" placeholder="Nome" required="required">
					<label for="inputNome">Nome</label>
				  </div>
				</div>
				<div class="form-group">
				  <div class="form-label-group">
					<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
					<label for="inputEmail">Usuário</label>
				  </div>
				</div>
				<div class="form-group">
				  <div class="form-row">
					<div class="col-md-6">
					  <div class="form-label-group">
						<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
						<label for="inputPassword">Senha</label>
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-label-group">
						<input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
						<label for="confirmPassword">Confirmar Senha</label>
					  </div>
					</div>
				  </div>
				</div>
			  </form>
		  </div>
          
		  <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="#">Cadastrar</a>
          </div>
        </div>
      </div>
    </div>
	
	
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
