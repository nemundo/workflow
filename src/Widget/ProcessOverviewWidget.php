<?php

namespace Nemundo\Workflow\Widget;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Com\Html\Basic\H3;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Design\Bootstrap\Button\BootstrapButton;
use Nemundo\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Site\Process\ProcessDescriptionSite;
use Nemundo\Workflow\Site\WorkflowNewSite;



class ProcessOverviewWidget extends AbstractAdminWidget
{

    public function getHtml()
    {

        $this->widgetTitle = 'Prozess Übersicht';

        $processReader = new ProcessReader();
        $processReader->addOrder($processReader->model->process);

        foreach ($processReader->getData() as $processRow) {

            $process = $processRow->getProcessClassObject();

            $title = new H3($this);
            $title->content = $process->name;

            $p = new Paragraph($this);
            $p->content = $process->description;

            $btn = new AdminButton($this);
            $btn->content = 'Erfassen';
            $btn->site = clone(WorkflowNewSite::$site);
            $btn->site->addParameter(new ProcessParameter($process->id));

            $btn = new AdminButton($this);
            $btn->content = 'Beschreibung';
            $btn->site = clone(ProcessDescriptionSite::$site);
            $btn->site->addParameter(new ProcessParameter($process->id));

        }

        return parent::getHtml();

    }

}