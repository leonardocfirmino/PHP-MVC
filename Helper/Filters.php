<?php
Namespace Helper;

class Filter{
    public function date_invert($data){
       return implode("/",array_reverse(explode("-",$data)));
    }
}