<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('valid_roll')){

    function valid_roll($roll) {
        $allowedRolles = ['admin','user'];
        if(!in_array($roll,$allowedRolles)){
            return false;
        }
        return true;
    }

}