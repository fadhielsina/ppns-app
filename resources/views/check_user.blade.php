<!DOCTYPE html>
<html lang="en">

<head>
    <title>PPNS </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{url('')}}\files\assets\images\favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{url('')}}\files\assets\icon\font-awesome\css\font-awesome.min.css">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{url('')}}\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{url('')}}\files\assets\icon\themify-icons\themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{url('')}}\files\assets\icon\icofont\css\icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{url('')}}\files\assets\css\style.css">
</head>

<body class="fix-menu">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->

                    <form class="md-float-material form-material" action="{{url('check_user')}}" method="POST">
                        @csrf
                        <div class="text-center">
                            <img src="{{url('')}}\files\assets\images\logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Check User</h3>
                                        @if($errors->any())
                                        <div class="alert alert-info">
                                            @foreach($errors->all() as $item)
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>
                                            <strong>{{$item}}</strong>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="nip" autofocus class="form-control" value="{{old('nip')}}" placeholder="Masuikan NIP">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary d-">
                                            <a href="{{url('/')}}" class="text-right f-w-600">
                                                <i class="fa fa-angle-double-left"></i> Login</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{url('')}}\files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="{{url('')}}\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{url('')}}\files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="{{url('')}}\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{url('')}}\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{url('')}}\files\bower_components\modernizr\js\modernizr.js"></script>
    <script type="text/javascript" src="{{url('')}}\files\bower_components\modernizr\js\css-scrollbars.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{url('')}}\files\bower_components\i18next\js\i18next.min.js"></script>
    <script type="text/javascript" src="{{url('')}}\files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="{{url('')}}\files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="{{url('')}}\files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <script type="text/javascript" src="{{url('')}}\files\assets\js\common-pages.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>

</html>