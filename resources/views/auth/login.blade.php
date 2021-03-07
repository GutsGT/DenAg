<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Denúncias de aglomerações por COVID-19</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


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
    <div class="wrapper" style="display:flex;justify-content:center;align-items:center;background-color: #eff6f5;">
        <div class="content">
            <div class="container">
                <div class="col-md-3 "></div>
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="content">
                            <div class="content" >
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="author">
                                            <center>
                                                <h2 style="color:#000">
                                                    <b>
                                                        <b>LOGIN</b>
                                                    </b>
                                                </h2>
                                            </center>              
                                        </div>      
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: black"><b>Email:</b></label>
                                                <input  class="form-control border-input" 
                                                        id="email"
                                                        style="background-color: white; border-radius: 0px; border-color: #c7d4e2; border-width: 3px" 
                                                        type="email" 
                                                        name="email" :value="old('email')" required autofocus
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: black"><b>Senha:</b></label>
                                                <input  type="password" 
                                                        class="form-control border-input" 
                                                        style="background-color: white; border-radius: 0px; border-color: #c7d4e2; border-width: 3px"
                                                        id="password"
                                                        name="password"
                                                        required autocomplete="current-password"
                                                >
                                                <b>
                                                    <a style ="color: #a9a9a9" href="esqsenha.html">Esqueci minha senha</a>
                                                </b>
                                            </div>
                                        </div>       
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" 
                                        class="btn btn-info btn-fill btn-wd" 
                                        style=" color:#000; 
                                        background-color: white; 
                                        border-radius: 0px; 
                                        border-color: #000; 
                                        border-width: 3px"
                                        href="dashboard"
                                    >
                                        <b>{{ __('Entrar') }}</b>
                                        </button>
                                    </div>
                                    <br>
                            </form>

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

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
