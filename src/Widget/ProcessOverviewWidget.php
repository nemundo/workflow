<?php

namespace Nemundo\Workflow\Widget;


use Nemundo\Admin\Widget\AbstractAdminWidget;
use Nemundo\Com\Html\Basic\H3;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Design\Bootstrap\Button\BootstrapButton;
use Nemundo\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Site\WorkflowNewSite;


class ProcessOverviewWidget extends AbstractAdminWidget
{

    public function getHtml()
    {

        $this->widgetTitle = 'Process Overview';

        $processReader = new ProcessReader();
        $processReader->addOrder($processReader->model->process);

        foreach ($processReader->getData() as $processRow) {

            $process = $processRow->getProcessClassObject();

            $title = new H3($this);
            $title->content = $process->process;

            $p = new Paragraph($this);
            $p->content = $process->description;

            $btn = new BootstrapButton($this);
            $btn->content = 'Erfassen';
            $btn->site = clone(WorkflowNewSite::$site);
            $btn->site->addParameter(new ProcessParameter($process->processId));

        }

        return parent::getHtml();

    }

}