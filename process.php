<?php
$string = "This is a poorly /written2 program,     with!little@ structure and readability.";

function tokenizeWords(string $str): array {
    $newString = "";

    // remove punctuations
    for ($i = 0; $i < strlen($str); $i++) {
        if (ctype_alpha($str[$i]) or $str[$i] == ' ') {
            $newString .= $str[$i];
        }
    }


    return explode(" ", $newString);
}

print_r (tokenizeWords($string));

?>