<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>DevStack</title>
        <!-- Latest compiled and minified CSS & JS -->
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

        <style type="text/css">
            .nav-link {
                color: white;
            }
            .nav-link:hover {
                color: lightgray;
            }
            main > .container {
                padding: 40px 0 20px 0;
            }
        </style>

    </head> 
    <body>
        <div id="app">
            <header>
                <div class="navbar navbar-dark bg-dark shadow-sm">
                    <div class="container d-flex justify-content-between">
                        <router-link class="navbar-brand d-flex align-items-center" to="/">
                            <img src="img/auction.svg" width="20" height="20" style="margin-right:20px"/>
                            <strong>DevStack - LTI Parte II</strong>
                        </router-link>
                        
                        <ul class="nav justify-content-end">
                            <li class="nav-item">
                                <router-link class="nav-link" to="/volumes">Volumes</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" to="/instances">Instances</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" to="/flavors">Flavors</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/login" class="btn btn-secondary" role="button">Login</router-link>
                            </li>

                    </ul>
                </div>
            </header>

            <main role="main">
                <div class="container">
                    <router-view></router-view> 
                </div>
            </main>    
        </div>
        <script src="js/app.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>

