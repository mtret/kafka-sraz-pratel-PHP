<?php

namespace App\Service;

use SymfonyBundles\KafkaBundle\DependencyInjection\Traits\ProducerTrait;

class ProducerService
{
    use ProducerTrait;

    /**
     * @param String $topic
     * @param array $data
     */
    public function send(String $topic, array $data): void
    {
        $this->producer->send($topic, $data);
    }

}