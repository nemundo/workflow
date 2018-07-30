<?php

namespace Nemundo\Workflow\App\Workflow\Com\Dropdown;


use Nemundo\Package\Bootstrap\Dropdown\BootstrapDropdown;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\App\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Site\WorkflowNewSite;

class ProcessRedirectDropdown extends BootstrapDropdown
{

    /**
     * @var AbstractSite
     */
    public $redirectSite;


    public function getHtml()
    {

        $processReader = new ProcessReader();

        foreach ($processReader->getData() as $processRow) {

            $process = $processRow->getProcessClassObject();

            if ($process->checkUserVisibility()) {

                $site = clone($this->redirectSite);
                $site->title = $processRow->process;
                $site->addParameter(new ProcessParameter($processRow->id));

                $this->addSite($site);

            }

        }

        return parent::getHtml();

    }

}