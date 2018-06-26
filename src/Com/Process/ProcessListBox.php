<?php

namespace Nemundo\Workflow\Com\Process;


use Nemundo\Design\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Workflow\Process\AbstractProcessCollection;

class ProcessListBox extends BootstrapListBox
{

    /**
     * @var AbstractProcessCollection
     */
    public $processCollection;


    protected function loadCom()
    {
        parent::loadCom();
        $this->label = 'Process';
    }


    public function getHtml()
    {

        if (!$this->checkObject('processCollection', $this->processCollection, AbstractProcessCollection::class)) {
            return parent::getHtml();
        }

        foreach ($this->processCollection->getProcessList() as $process) {
            $this->addItem($process->processId, $process->process);
        }

        return parent::getHtml();
    }


}