<?php
    function gen_randome(){
        return md5(uniqid(rand(), true));
    }