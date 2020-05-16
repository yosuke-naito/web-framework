<?php
require_once("../controllers/Controller.php");

class ErrorOrExceptionController extends Controller {
    function indexGET() {
        require_once("../views/ErrorOrExceptionViewIndexGET.html");
    }
}
?>

