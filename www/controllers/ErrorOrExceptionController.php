<?php
require_once("../controllers/Controller.php");

class ErrorOrExceptionController extends Controller {
    function indexGET() {
        $smarty = $this->getSmarty();
        $smarty->display("ErrorOrExceptionViewIndexGET.html");
    }
}
?>

