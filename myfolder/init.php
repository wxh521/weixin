<?php

header('Content-Type: text/html; charset=UTF-8');

error_reporting(E_ALL | E_STRICT);
ini_set("display_errors","on");

session_start();

if (class_exists('R')) {
//    R::setup('mysql:host=hdm-115.hichina.com;dbname=hdm1150141_db', 'hdm1150141', '19820819');
    R::setup('mysql:host=127.0.0.1;dbname=weixin', 'root', '820819');
}