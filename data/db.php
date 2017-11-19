<?php

class DB {

    public static function getData($query, $server, $database, $login, $password) {
        $mysqli = mysqli_connect($server, $login, $password, $database);
        if (mysqli_connect_errno()) {
            header("Location: ../pages/error.php?message=" . mysqli_connect_error());
        }
        mysqli_query($mysqli, "SET NAMES 'UTF8'");

        $result = mysqli_query($mysqli, $query);
        mysqli_close($mysqli);

        return $result;
    }

    public static function setData($query, $server, $database, $login, $password) {
        $mysqli = mysqli_connect($server, $login, $password, $database);
        if (mysqli_connect_errno()) {
            header("Location: ../pages/error.php?message=" . mysqli_connect_error());
        }
        mysqli_query($mysqli, "SET NAMES 'UTF8'");

        if (!$mysqli->query($query)) {
            header("Location: ../pages/error.php?message=" . "Request failed (" . $mysqli->errno . "):<br>" . $mysqli->error);
        }
    }

}
