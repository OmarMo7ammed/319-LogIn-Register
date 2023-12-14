<?php

    include_once"authentication/functions.php";
    session_start();
    session_unset();
    session_destroy();
    redirect("login.php");