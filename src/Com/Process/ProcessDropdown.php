<?php

namespace Nemundo\Workflow\Com\Process;


use Nemundo\Design\Bootstrap\Dropdown\BootstrapDropdown;
use Nemundo\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Site\WorkflowNewSite;

class ProcessDropdown extends BootstrapDropdown
{

    public function getHtml()
    {

        $processReader = new ProcessReader();

        foreach ($processReader->getData() as $processRow) {

            $process = $processRow->getProcessClassObject();

            if ($process->checkUserVisibility()) {

                $site = clone(WorkflowNewSite::$site);
                $site->title = $processRow->process;
                $site->addParameter(new ProcessParameter($processRow->id));

                $this->addSite($site);

            }

        }

        return parent::getHtml();

    }

}