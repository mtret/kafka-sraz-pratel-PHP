<?php

namespace App\Service;

use SymfonyBundles\KafkaBundle\Consumer\Consumer;

class ConsumerService extends Consumer
{

    public const DEFAULT_TIMEOUT = 10000;

    public function consume($timeout = self::DEFAULT_TIMEOUT): \RdKafka\Message {
        return parent::consume($timeout);
    }

}