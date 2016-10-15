<?php
    function get_param($name, $default) {
        if (!isset($_GET[$name]))
        return $default;
        return urldecode($_GET[$name]);
    }
    
?>