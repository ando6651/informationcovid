<!DOCTYPE html>
<html class="menu">
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $metacontent; ?>">
	<meta name="google-site-verification" content="9kkLPRI7Lx2Xq5OOKI8imS8zffF-r_d7UoZ1qMmSNJs" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/nav.css" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
    <title><?php echo $title; ?></title>
</head>

<body>
    <nav class="fixed">
        <div class="divlogo">
            <img class="logo" style="width:132px;" src="<?php echo $base_url; ?>assets/images/coronavirus.png" alt="coronavirus">
        </div>
        <ul style="margin: auto;">
            <li class="navitem">
                <a href=" <?php echo $base_url; ?>information-covid-19.html">
                    <h4 class="nav-text">Information</h4>
                </a>
            </li>
            <li class="navitem dropdown">
                <a class="dropbtn">
                    <h4 class="nav-text" style="color: #757575;">Situation +</h4>
                </a>
                <ul class="dropdown-content">
                    <li>
                        <a href="<?php echo $base_url; ?>situation-actualite-statistique-covid-19-mondiale.html">
                            <h4 class="navtext">Mondiale</h4>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $base_url; ?>situation-actualite-statistique-covid-19-madagascar.html">
                            <h4 class="navtext">Madagascar</h4>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <section id="screen1"></section>