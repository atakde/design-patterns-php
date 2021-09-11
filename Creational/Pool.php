<?php

class WorkerEntity
{
    private $workerId;
    private $workerName;

    public function __construct($workerId, $workerName)
    {
        $this->workerId = $workerId;
        $this->workerName = $workerName;
    }

    public function getWorkerId()
    {
        return $this->workerId;
    }

    public function getWorkerName()
    {
        return $this->workerName;
    }
}

class Pool
{
    private $activeWorkers = [];
    private $freeWorkers = [];

    private $workerNames = ['WorkerX', 'WorkerY', 'WorkerZ'];

    public function getWorker()
    {
        if (!count($this->freeWorkers)) {
            $workerCount = count($this->activeWorkers) + count($this->freeWorkers);
            $randomName = $this->workerNames[array_rand($this->workerNames, 1)];
            $worker = new WorkerEntity(++$workerCount, $randomName);
        } else {
            $worker = array_pop($freeWorkers);
        }

        $this->activeWorkers[$worker->getWorkerId()] = $worker;
        return $worker;
    }

    public function setFree(WorkerEntity $worker)
    {
        $workerId = $worker->getWorkerId();
        if ($workerId && array_key_exists($workerId, $this->activeWorkers)) {
            unset($this->activeWorkers[$workerId]);
            $this->freeWorkers[$workerId] = $worker;
        }
    }
}

$pool = new Pool();

$worker1 = $pool->getWorker();
$worker2 = $pool->getWorker();

$pool->setFree($worker2);
var_dump($pool);
