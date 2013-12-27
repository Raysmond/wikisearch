<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title><?= Rays::app()->getName() ?></title>
    <?php $baseUrl = Rays::baseUrl(); ?>
    <!-- Bootstrap core CSS -->
    <link href="<?= $baseUrl ?>/app/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $baseUrl ?>/app/assets/css/navbar-fixed-top.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <!--<script src="../../assets/js/html5shiv.js"></script>-->
    <!--<script src="../../assets/js/respond.min.js"></script>-->
    <![endif]-->
</head>
<body class="<?=((Rays::uri()=="" || Rays::uri()=="search/index")?"front":"page-".Rays::router()->getControllerId()."-".Rays::router()->getActionId())?>">
<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?=Rays::app()->getName()?></a>
        </div>
        <?php
        $curUrl = Rays::uri();
        if(($pos = strpos($curUrl,"?"))!==false)
            $curUrl = substr($curUrl,0,$pos);
        ?>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="<?=($curUrl=='site/index'||$curUrl=='')?'active':''?>"><a href="<?=Rays::baseUrl()?>">Home</a></li>
                <li class="<?=($curUrl=='site/about')?'active':''?>"><?=RHtml::linkAction("site","About","about")?></li>
                <li class="<?=($curUrl=='site/contact')?'active':''?>"><?=RHtml::linkAction("site","Contact","contact")?></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="https://github.com/Raysmond/EnWikiIndexing" target="_blank">Github</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>

<div class="container">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="row main-content">
        <?= isset($content) ? $content : '' ?>
    </div>

</div>

<div id="footer">
    <div class="container">
        <hr>
        Copyright &copy; <a href="http://raysmond.com">Raysmond</a> 2013. All Right Reserved.
    </div>
</div>
<!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= $baseUrl ?>/app/assets/js/jquery.min.js"></script>
<script src="<?= $baseUrl ?>/app/assets/js/bootstrap.min.js"></script>
<script src="<?= $baseUrl ?>/app/assets/js/main.js"></script>
</body>
</html>
