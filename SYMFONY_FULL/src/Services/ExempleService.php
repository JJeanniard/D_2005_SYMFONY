<?php
/**
 * ExempleService.php
 *
 * Exemple de service pour être appelé dans de multiple classe
 *
 * @author Jjeanniard
 * @version 0.0.1
 */

namespace App\Services;


class ExempleService
{

    private $lastname;
    private $firstname;

    public function __construct($lastname, $firstname)
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
    }

    public function hello(){
        return "Hello $this->lastname $this->firstname";
    }
}