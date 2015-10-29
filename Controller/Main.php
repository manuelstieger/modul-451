<?php

include_once __DIR__."/../Entity/Person.php";
include_once __DIR__."/../Entity/Queue.php";

require_once __DIR__.'/../vendor/autoload.php';

/**
 * Class main
 */
class main {

    private $error = false;

    function queuePerson()
    {
        $queue = new Entity\Queue();

        $queue->readFile();

        $person = new Entity\Person();

        if($_REQUEST['queuePerson']) {
            $person->setFirstname($_POST['firstname']);
            $person->setLastname($_POST['lastname']);
            $person->setAge($_POST['age']);

            $queue->add($person);

            $queue->writeFile();
        }

        $data = array(
            "error" => $this->error
        );

        $this->show('queue.twig', $data);
    }

    function callPerson()
    {
        $queue = new Entity\Queue();

        $queue->readFile();

        $persons = array();

        if($_REQUEST['callPerson']) {
            $persons = $queue->getQueue();

            $queue->remove($persons[0]);
            $queue->writeFile();
        }

        $data = array(
            "person" => $persons[0],
            "length" => $queue->getLength()
        );

        $this->show('call.twig', $data);
    }

    /**
     * @param $template
     * @param $data
     */
    function show($template, $data)
    {
        $loader = new Twig_Loader_Filesystem(__DIR__.'/../Resources/templates');
        $twig = new Twig_Environment($loader, array());

        switch($template) {
            case "call":
                echo $twig->render($template, array("data" => $data));
                break;
            case "queue":
                echo $twig->render($template, array("data" => $data));
                break;
            default:
                echo $twig->render($template, array("data" => $data));
        }
    }

    function doRequest()
    {
        if($_REQUEST['view'] == "queue") {
            $this->queuePerson();
        }
        else {
            $this->callPerson();
        }
    }
}