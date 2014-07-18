<?php

header('Content-Type: text/html; charset=UTF-8');

error_reporting(E_ALL | E_STRICT);
ini_set("display_errors","on");

R::setup('mysql:host=localhost;dbname=mydatabase', 'user', 'password');