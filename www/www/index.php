<?php
require_once("../routers/Router.php");
session_start();

function main() {
    try {

        if (!isset($_SESSION["router"])) {
            $_SESSION["router"] = new Router();
        }

        $_SESSION["router"]->execute();
    } catch (Throwable $e) {
        error_log($e);
        require_once("../controllers/ErrorOrExceptionController.php");
        (new ErrorOrExceptionController())->indexBefore();
    }
}

main();
?>
