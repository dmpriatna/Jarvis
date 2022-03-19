<?php

function LogInfo()
{
    if (func_num_args() == 0) {
        return;
    }

    $tag = '';
    for ($i = 0; $i < func_num_args(); $i++) {
        $arg = func_get_arg($i);
        if (!empty($arg)) {
            if (is_string($arg) && strtolower(substr($arg, 0, 4)) === 'tag-') {
                $tag = substr($arg, 4);
            } else {
                $arg = json_encode($arg, JSON_HEX_TAG | JSON_HEX_AMP);
                echo "<script>console.log('" . $tag . " " . $arg . "');</script>";
            }
        }
    }
}
