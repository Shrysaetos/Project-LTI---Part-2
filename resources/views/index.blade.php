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
                        
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" tag="button">Compute</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <router-link to="/instances" class="dropdown-item">Instances</router-link>
                                    <router-link to="/images" class="dropdown-item">Images</router-link>
                                    <router-link to="/flavors" class="dropdown-item">Flavors</router-link>
                                    <router-link to="/keypairs" class="dropdown-item">Key Pairs</router-link>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" tag="button">Volumes</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <router-link to="/volumes" class="dropdown-item">Volumes</router-link>
                                    <router-link to="/groups" class="dropdown-item">Groups</router-link>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" tag="button">Networking</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <router-link to="/networks" class="dropdown-item">Networks</router-link>
                                    <router-link to="/security-groups" class="dropdown-item">Security Groups</router-link>
                                    <router-link to="/floatingips" class="dropdown-item">Floating IPs</router-link>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <router-link to="/login" class="btn btn-secondary" role="button">Login</router-link>
                        </li>
                    </div>
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

