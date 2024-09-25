<?php
$i = 0; $i < strlen($str); $i++) {
        if (ctype_alpha($str[$i]) or $str[$i] == ' ') {
            $newString .= $str[$i];
        }
    }