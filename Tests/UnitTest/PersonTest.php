<?php

namespace Tests\UnitTest;

use Entity\Person;

include_once __DIR__."/../../Entity/Person.php";

class PersonTest extends \PHPUnit_Framework_TestCase
{


    public function testFirstname()
    {
        $person = new Person();

        $person->setFirstname("Manuel");

        $this->assertInternalType("string", $person->getFirstname());
    }

    public function testLastname()
    {
        $person = new Person();
        $person->setLastname("Stieger");
        $this->assertInternalType("string", $person->getLastname());

        $person = new Person();
        $person->setLastname(1234);
        $this->assertEmpty($person->getLastname());

        $person = new Person();
        $person->setLastname("$!)*");
        $this->assertEmpty($person->getLastname());

        $person = new Person();
        $person->setLastname("");
        $this->assertEmpty($person->getLastname());
    }

    public function testAge()
    {
        $person = new Person();

        $person->setAge(26);

        $this->assertInternalType("int", $person->getAge());
    }

    protected function tearDown()
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }

}
