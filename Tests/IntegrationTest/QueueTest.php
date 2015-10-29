<?php
namespace Tests\IntegrationTest;

use Entity\Person;
use Entity\Queue;

include_once __DIR__."/../../Entity/Queue.php";
include_once __DIR__."/../../Entity/Person.php";

class QueueIntegrationTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $queue = new Queue();

        $person = new Person();

        $person->setFirstname("Manuel");
        $person->setLastname("Stieger");
        $person->setAge(26);

        $this->assertEquals("Manuel", $person->getFirstname());
        $this->assertEquals("Stieger", $person->getLastname());
        $this->assertEquals(26, $person->getAge());

        $queue->add($person);

        $this->assertEquals(1, $queue->getLength());
    }

    public function testRemove()
    {
        $queue = new Queue();

        $person = new Person();

        $person->setFirstname("Manuel");
        $person->setLastname("Stieger");
        $person->setAge(26);

        $queue->add($person);

        $this->assertEquals(1, $queue->getLength());

        $queue->remove($person);

        $this->assertEquals(0, $queue->getLength());
    }

    public function testWriteFile()
    {
        $queue = new Queue();

        $person = new Person();

        $person->setFirstname("Manuel");
        $person->setLastname("Stieger");
        $person->setAge(26);

        $queue->add($person);

        $queue->writeFile();
    }

    public function testReadFile()
    {
        $queue = new Queue();

        $queue->readFile();
    }

}
