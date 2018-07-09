<?php

namespace Nemundo\Workflow\Site\Process;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Data\Workflow\WorkflowCount;
use Nemundo\Workflow\Parameter\ProcessParameter;

class ProcessDescriptionSite extends AbstractSite
{

    /**
     * @var ProcessDescriptionSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'description';
        $this->menuActive = false;

    }


    protected function registerSite()
    {
        ProcessDescriptionSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $processId = (new ProcessParameter())->getValue();
        $processRow = (new ProcessReader())->getRowById($processId);
        $process = $processRow->getProcessClassObject();

        $title = new AdminTitle($page);
        $title->content = $processRow->process;

        $table = new AdminLabelValueTable($page);
        $table->addLabelValue('Start Status', $process->startWorkflowStatusClassName);


        $subtitle = new AdminSubtitle($page);
        $subtitle->content= 'Statistik';

        $count = new WorkflowCount();
        $count->filter->andEqual($count->model->processId, $processId);
        $itemCount = $count->getCount();


        $table = new AdminLabelValueTable($page);
        $table->addLabelValue('Anzahl Einträge', $itemCount);




        $page->render();

    }


}