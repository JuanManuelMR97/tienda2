<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.googlemail.com';
$config['smtp_port'] = 465;
$config['smtp_user'] = 'segundodaw2019@gmail.com';
$config['smtp_pass'] = 'segundodaw';
$config['smtp_timeout'] = '7';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['mailtype'] = 'html'; // or text
$config['validation'] = TRUE; // bool whether to validate email or not