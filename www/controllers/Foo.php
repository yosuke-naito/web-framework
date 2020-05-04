<?php
class Foo {
    private $id;

    function bar($id) {
        if (is_null($id) || empty($id)) {
            throw new Exception();
	}

        echo $id . "<br/>";
        echo "EOF<br/>";
    }
}
/*
    //$controllerObject->$method($id);
    //modelのindexメソッドを呼ぶ仕様です
    //$ret = $class->index($analysis);
    //配列キーが設定されている配列なら展開します
    if (!is_null($ret)) {
        if(is_array($ret)){
           extract($ret);
        }
    }
}

//viewをインクルードします
if (file_exists("./views/".$call.".php")) {
    include("./views/".$call.".php");
} else {
    include("./views/error.php");
}
*/
?>
