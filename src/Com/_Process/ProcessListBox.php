<?php

namespace Nemundo\Workflow\Com\Process;


use Nemundo\App\Content\Collection\AbstractContentTypeCollection;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Workflow\Process\AbstractProcessCollection;

class ProcessListBox extends BootstrapListBox
{

    /**
     * @var AbstractContentTypeCollection
     */
    public $processCollection;


    protected function loadCom()
    {
        parent::loadCom();
        $this->label = 'Process';
    }


    public function getHtml()
    {

       /* if (!$this->checkObject('processCollection', $this->processCollection, AbstractProcessCollection::class)) {
            return parent::getHtml();
        }*/

        foreach ($this->processCollection->getContentTypeList() as $process) {
            $this->addItem($process->id, $process->name);
        }

        return parent::getHtml();
    }


}