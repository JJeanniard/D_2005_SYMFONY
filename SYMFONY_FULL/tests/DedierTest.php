<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Dedier;

class DedierTest extends TestCase
{
    /*public function testCreateDedier(): void
    {
        $dedier = new Dedier();

        $dedier->setName("ovh_01");
        //Leve une erreur sur la sortie du résultat
        //$dedier->setName("ovh_02");

        $this->assertSame("ovh_01", $dedier->getName());
    }*/

    /**
     * @dataProvider createDediers
     * @param $name
     * @param $egalName
     */
    public function testAddDedier($name, $egalName)
    {
        $dedier = new Dedier();

        $dedier->setName($name);

        $this->assertSame($egalName, $dedier->getName());
    }

    public function createDediers(){
        return [
          ['ovh_01', 'ovh_01'],
          ['ovh_02', 'ovh_02'],
          ['ovh_03', 'ovh_03']
        ];
    }
}
