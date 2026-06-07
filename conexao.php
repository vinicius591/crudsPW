<?php
$conexao = new PDO("mysql:host=db;dbname=bancovini;charset=utf8", "root", "root");
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);