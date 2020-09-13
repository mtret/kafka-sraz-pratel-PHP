<?php
declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use SymfonyBundles\KafkaBundle\Command\Consumer;

class Consume extends Consumer
{
    public const QUEUE_NAME = 'sraz_pratel_symfony';

    protected static $defaultName = 'consume';

    protected function onMessage(array $data)
    : void {
        var_dump($data);
    }
}
