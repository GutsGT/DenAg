<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Denúncias de aglomerações por COVID-19</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="stylesheet" style="text/css" href="/ptdomestico comum/assets/css/custom.css">

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- css personalizado -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="assets/css/styleModal.css" rel="stylesheet" />

    <link href="phplot-6.2.0/phplot.php">
    <link href="phplot-6.2.0/rgb.inc.php">
    
</head>

<body>
    <script>alert('{{$teste}}');</script>
    <div class="main-panel">
        <div class="col-lg" id="header-mobile">
            <a class="navbar-brand" id="navbard-brand-mobile" style="color: #777; font-weight: bold" href="#">{{$sessao->name}}</a>
            <div class="container-toggle-button" onclick="myFunction(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </div>
        <div class="col-lg">
            <form action="/logout" method="POST">
                @csrf
                <a class="navbar-brand" 
                    id="botaoSair" 
                    style="float:right; color: #9d9d9d; font-size: 13px;display: flex;justify-content: center;align-items: center;" 
                    href="/logout"
                    onclick="event.preventDefault();
                            this.closest('form').submit();"
                >
                    <span class="material-icons">logout</span>
                    <span id="texto-sair" style="margin: 5px; font-weight: 700">Sair</span>
                </a>
            </form>
        </div>
    </div>

    <div class="content" style="background-color: #eff6f5;">            
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Gráfico</h4>
                                </div>
                                <div class="content">
                                    <?php
                                        SetFileFormat("png");    

                                        #Indicamos o título do gráfico e o título dos dados no eixo X e Y do mesmo
                                        $grafico->SetTitle("Gráfico de denúncias");
                                        $grafico->SetXTitle("Dias");
                                        $grafico->SetYTitle("Q. denúncias");


                                        #Definimos os dados do gráfico
                                        $dados = array(
                                                array('Janeiro', 10),
                                                array('Fevereiro', 5),
                                                array('Março', 4),
                                                array('Abril', 8),
                                                array('Maio', 7),
                                                array('Junho', 5),
                                        );

                                        $grafico->SetDataValues($dados);

                                        $grafico->SetPlotType();

                                        #Exibimos o gráfico
                                        $grafico->DrawGraph();
                                    ?>
                                    
                                </div>
                                <div class="card-footer">
                                    <div class="legend">
                                        <div class="text-center">
                                            <i class="fa fa-circle " style=" color: #000"></i> y - Denúncias
                                            <i class="fa fa-circle " style=" color: #000"></i> x - Dias
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="content">
                                  <h4 class="title" style="margin-bottom: 10px">Tabela de Denúncias</h4>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                      <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                  <table class="table table-responsive">
                                    
                                    <!--Listagem das denúncias-->
                                    <thead style="background-color: #000; color: white">
                                        <th>Endereço</th>
                                        <th>Data</th>
                                        <th>Complemento</th>
                                        <th class="text-center" colspan="3">Ação</th>
                                    </thead>
                                    <tbody>
                                        @foreach($complaints as $complaint)
                                            <tr>
                                                <td scope="row">
                                                    {{$complaint->address}}
                                                </td>
                                                <td>
                                                    {{$complaint->created_at->format('d-m-Y, H:m')}}
                                                </td>
                                                <td>
                                                    {{$complaint->complement}}
                                                </td>
                                                <td>
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger delete-btn">
                                                            <ion-icon name="trash-outline"></ion-icon>Fechar
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <!--Fim da listagem das denúncias-->

                                </table>
                            </div>
                            <div class="text-center">
                                <nav aria-label="Navegação de página exemplo">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Anterior">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Anterior</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Próximo">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Próximo</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>


<script src="assets/js/scriptModal.js"></script>


</html>