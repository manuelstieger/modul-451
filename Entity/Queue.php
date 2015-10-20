<?php

namespace Entity;

/**
 * Class Queue
 * @package Entity
 */
class Queue {
    /**
     * @var array queue
     */
    public $queue;

    /**
     * @var string jsonFile
     */
    private $jsonFile = __DIR__."/../Resources/data/queue.json";

    /**
     * Queue constructor.
     */
    public function __construct()
    {
        $this->queue = array();
    }

    /**
     * @return array
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * @param array $queue
     * @return Queue
     */
    public function setQueue($queue)
    {
        $this->queue = $queue;
        return $this;
    }

    public function add($person)
    {
        $this->queue[] = $person;
    }

    public function remove($person)
    {
        foreach ( $this->queue as $i => $item )
        {
            if ($item['firstname'] == $person['firstname'] && $item['lastname'] == $person['lastname'] && $item['age'] == $person['age'])
            {
                unset($this->queue[$i]);
            }
        }
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return count($this->queue);
    }

    public function readFile()
    {
        $fileContent = file_get_contents($this->jsonFile);
        if($fileContent != '') {
            $this->queue = json_decode($fileContent, true);
        }
    }

    public function writeFile()
    {
        $fileContent = json_encode(array_values($this->queue), JSON_PRETTY_PRINT);
        file_put_contents($this->jsonFile, $fileContent);
    }

}