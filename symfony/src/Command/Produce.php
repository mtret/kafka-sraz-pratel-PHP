<?php
declare(strict_types=1);

namespace App\Command;

use App\Service\ProducerService;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Produce extends Command
{

    /**
     * @var ProducerService
     */
    protected $producerService;

    public function __construct(ProducerService $producerService)
    {
        parent::__construct();
        $this->producerService = $producerService;
    }

    protected function configure()
    {
        $this->setName('produce')
            ->setDescription('Kafka Producer')
            ->addArgument('topic', InputArgument::REQUIRED, 'Which topic you want to produce to?');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $timestamp = time();
            $this->producerService->send($input->getArgument('topic'), ['Zprava ' . $timestamp]);
            $output->writeln('Message produced successfully! Timestamp was: ' . $timestamp);
        } catch (Exception $e) {
            $output->writeln('Message producing failed!');
            $output->writeln($e->__toString());
        }

        return 0;
    }
}
