<?php
require_once("../routers/Router.php");
session_start();

function main() {
    try {
        $router = new Router();
        $router->execute();
    } catch (Throwable $e) {
        error_log($e);
        require_once("../controllers/ErrorOrExceptionController.php");
        (new ErrorOrExceptionController())->indexGET();
    }
}

main();
?>
