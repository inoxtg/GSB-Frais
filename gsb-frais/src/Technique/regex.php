<?php

namespace App\Technique;


/*
 1 caractère minimum, only lettre
 */
function regLettreOnly($input){
    if(preg_match("/^[a-z]+$/", $input)) {
        return true;
    }
    return false;
}

/*
 only lettre & chiffre, 0 inclut
 */
function regLettreChiffreOnly($input){
    if(preg_match("/^([a-z]|[0-9])+$/", $input)) {
        return true;
    }
    return false;
}

