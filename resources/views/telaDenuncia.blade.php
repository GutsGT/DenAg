<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Denúncias de aglomerações COVID-19</title>
<link href="http://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
<link href="assets/css/default.css" rel="stylesheet" type="text/css" media="all" />
<link rel="icon" type="image/png" sizes="96x96" href="assets/img/doenca.png">

<!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>
<div id="wrapper1">

	<div id="header-wrapper1">
		<div id="header1" class="container1">
			<div id="logo1">
				<a href="/">
                    <img src="assets/img/doenca.png" alt="Denúncia de Aglomeração Covid-19"> Denúncia de Aglomeração Covid-19
                </a>
			</div>
		</div>
	</div>

	<div class="wrapper" style="display:flex;justify-content:center;align-items:center;background-color: #eff6f5;">
        <div class="content">
            <div class="container">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="content">
                            <div class="content">
                                <br>
                                <form action="obrigado" method="POST">
                                    @csrf
                                    <div>
                                        <center>
                                            <h4 style="color:#000"><b><b>Denúncia de aglomeração:</b></b></h4>
                                        </center>              
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <label style="color: black"><b>Cidade:</b></label>
                                                
                                                <select name="city"
                                                        id="city" 
                                                        class="form-control border-input"
                                                        style="background-color: white; border-radius: 0px; border-color: #c7d4e2; border-width: 3px" 
                                                >
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                                <br/>
                                                <label style="color: black">
                                                    <b>Endereço:</b>
                                                </label>
                                                <input  type="text" 
                                                        id="address" 
                                                        name="address" 
                                                        class="form-control border-input" 
                                                        style="background-color: white; border-radius: 0px; border-color: #c7d4e2; border-width: 3px" 
                                                        placeholder="Rua Do Tio, 550"
                                                >
                                                <br/>
                                                <label style="color: black">
                                                    <b>Deseja fazer algum complemento?</b>
                                                </label>
                                                <input  type="text" 
                                                        id="complement" 
                                                        name="complement" 
                                                        class="form-control border-input" 
                                                        style="background-color: white; border-radius: 0px; border-color: #c7d4e2; border-width: 3px" 
                                                        placeholder="Aglomeração grande"
                                                >
                                            </div>
                                            <br>
                                        </div>                                         
                                    </div>
                                    <br>
                                    <div class="text-right">
                                        <button type="submit" 
                                                class="btn btn-info btn-fill btn-wd" 
                                                style="color:#000; 
                                                        background-color: white; 
                                                        border-radius: 0px; 
                                                        border-color: #000; 
                                                        border-width: 3px; 
                                                        height: 40px"
                                        >
                                        <b>Enviar</b>
                                        </button>
                                    </div>
                                </form>
                            <div class="clearfix"></div>
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

<script src="assets/js/demo.js"></script>

</html>
