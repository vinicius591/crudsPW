<?php
seesion_statrt();
if (!isset($_SESSION['usuario_id'])){
    header("Location: login.php");
    exit();
}