<?php

namespace Nemundo\Workflow\Site\Item;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Basic\H1;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\Com\WorkflowItemList;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Parameter\WorkflowParameter;

class WorkflowItem2Site extends AbstractSite
{

    /**
     * @var WorkflowItem2Site
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'item2';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        $this::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $workflowId = (new WorkflowParameter())->getValue();

        $workflowItem = new WorkflowItem($workflowId);


        $title = new AdminTitle($page);
        $title->content = $workflowItem->getTitle();


        $table = new AdminTable($page);

        foreach ($workflowItem->getStatusChange() as $log) {

            $row = new TableRow($table);
            $row->addText($log->workflowStatus->workflowStatus);
            $row->addText($log->user->displayName);
            $row->addText($log->dateTime->getShortDateTimeLeadingZeroFormat());

        }


        $subtitle = new AdminSubtitle($page);
        $subtitle->content = 'next step';

        $list = new UnorderedList($page);

        foreach ($workflowItem->getFollowingStatus() as $followingStatus) {
            $list->addText($followingStatus->workflowStatus);

            $form = new WorkflowForm($page);
            $form->workflowStatus = $followingStatus;
            $form->workflowId = $workflowId;

        }


        /*
        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadWorkflowStatus();
        $workflowReader->model->loadProcess();
        $workflowRow = $workflowReader->getRowById($workflowId);

        $application = $workflowRow->process->getProcessClassObject();

        //$title = new H1($page);
        //$title->content = $application->process;

        $workflow = new WorkflowItemList($page);
        $workflow->process = $application;
        $workflow->workflowId = $workflowRow->id;*/

        $page->render();


    }


}