<?php
error_reporting(E_PARSE);
if (isset($_POST["submit"])) {

    try {
        include "db_config.php";
        $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO logs (nome, tipo) VALUES ('" . $_POST["nome"] . "','" . $_POST["tipo"] . "')";
        if ($DB_con->query($sql)) {
            echo ("<script>window.location = 'sistema.php';</script>");
        } else {
            echo "<script type= 'text/javascript'>alert('Erro.');</script>";
        }

        $DB_con = "";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
