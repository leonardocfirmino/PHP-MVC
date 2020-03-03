<?php
Namespace Core;

class database{
     public function con(){
         global $db;
         return $db;
     }
}
