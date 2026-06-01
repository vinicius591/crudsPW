<?php
$conexao = new PDO ("mysql:host=localhost;dbname=bancovini","root", "");
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);