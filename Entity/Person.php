<?php

namespace Entity;

/**
 * Class Person
 * @package Entity
 */
class Person {
    /**
     * @var string firstame
     */
    public $firstname;

    /**
     * @var string lastname
     */
    public $lastname;

    /**
     * @var int age
     */
    public $age;

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return Person
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return Person
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return Person
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }
}