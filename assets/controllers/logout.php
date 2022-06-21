<?php
session_start();

$acao = $_REQUEST['acao'];

if($acao == 'sair'){
    session_destroy();
    header("Location: login-diesel-control-v1");
}