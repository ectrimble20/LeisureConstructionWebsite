<?php

?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <div class="navbar-header">
                <img src="/Web/img/logo-200x54.png">
            </div>
            <ul class="nav navbar-nav navbar-default">
                <li><a href="/user" id="menuUser"><span class="glyphicon glyphicon-user"></span> USERS</a></li>
                <li><a href="/audit" id="menuAudit"><span class="glyphicon glyphicon-eye-open"></span> AUDIT LOG</a></li>
                <li><a href="/image" id="menuImage"><span class="glyphicon glyphicon-picture"></span> IMAGES</a></li>
                <li><a href="/about" id="menuImage"><span class="glyphicon glyphicon-comment"></span> ABOUT</a></li>
                <li><a href="/endorse" id="menuImage"><span class="glyphicon glyphicon-thumbs-up"></span> ENDORSERS</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user"></span> <?=$logged_in_user?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container bg-grey" id="home">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">&nbsp;</div>
    </div>
</div>