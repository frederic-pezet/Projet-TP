<?php

$composition = new compositions();

if (!empty($_POST['groupeName'])) {
    if (preg_match($regex['groupeName'], $_POST['groupeName'])) {
        $composition->groupe_name = strtolower(htmlspecialchars($_POST['groupeName']));
    } else {
        $formErrors['groupeName'] = COMPOSITIONS_GROUPENAME_INVALID;
    }
} else {
    $formErrors['groupeName'] = COMPOSITIONS_GROUPENAME_EMPTY;
}