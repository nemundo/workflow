<?php

namespace Nemundo\Workflow\Process;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractProcessCollection extends AbstractBase
{

    /**
     * @var AbstractProcess[]
     */
    private $processList;

    abstract protected function loadProcessCollection();


    public function __construct()
    {
        $this->loadProcessCollection();
    }


    public function getProcessList()
    {
        return $this->processList;
    }


    protected function addProcess(AbstractProcess $process)
    {
        $this->processList[] = $process;
    }

}