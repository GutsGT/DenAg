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

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/default.css" rel="stylesheet" type="text/css" media="all" />

    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="assets/css/demo.css" rel="stylesheet" />
    
</head>

<body style="background-color: #eff6f5;">
    <div class="row" style="
    background-color: #fff; 
    margin: 0px; 
    padding: 12px; 
    border-bottom: 1px solid rgba(102, 97, 91, 0.3); 
    z-index: 9999999;">
        <div class="col-lg" id="header-mobile">
            <a class="navbar-brand" id="navbard-brand-mobile" style="color: #777; font-weight: bold">{{$sessao->name}}</a>
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
                    <span class="material-icons">
                        logout
                    </span>
                    <span id="texto-sair" style="margin: 5px; font-weight: 700">Sair</span>
                </a>
            </form>
        </div>
    </div>

    <div class="content" style="background-color: #eff6f5;  padding-top: 50px;">            
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div id="chart_div"></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="content">
                                  <h4 class="title" style="margin-bottom: 10px">Tabela de Denúncias</h4>
                                    <br/>
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
                                                    <form action="fecharDenuncia/{{$complaint->id}}" method="POST">
                                                        @csrf
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
                                        {{ $complaints->links() }}
                                    </ul>
                                </nav>
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

<!-- Paper Dashboard DEMO methods, dont include it in your project! -->
<script src="assets/js/demo.js"></script>


<script src="assets/js/scriptModal.js"></script>

<!---------------- Google Charts ---------------->
<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.

      var datas = [];
      function drawChart() {

        var dataAtual = 1;
        //new Date().getDate()
        
        var month = 4;
        //new Date().getMonth()+1

        for(var f = 6 ; f > -1 ; f--){ 
          data = dataAtual - f;

          if(data < 1){
            //Volta um mês
            if(month%2 == 0){
              //Mês par
              data = 31 + data;
            }else{
              //Mês ímpar
              if(month == 3){
                data = 28 + data;
              }else{
                data = 30 + data;
              }
            }
            datas[f] = data+'/'+(month-1);
          }else{
            //Mantém o mês
            datas[f] = data+'/'+month;
          }
        }

        // Create the data table.
        var data = new google.visualization.DataTable();

        data.addColumn('string');
        data.addColumn('number');
        
        data.addRows([
          [datas[6], 1],
          [datas[5], 5],
          [datas[4], 3],
          [datas[3], 9],
          [datas[2], 15],
          [datas[1], 6],
          [datas[0], 7]
        ]);

        // Set chart options
        var options = {
          'title': 'Quant. de denuncias dos últimos 7 dias',
          'width': '100%',
          'height': 400
        };
        
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <!----------------------------------------------->

</html>