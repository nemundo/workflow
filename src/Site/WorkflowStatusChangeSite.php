<?php

namespace Nemundo\Workflow\Site;

use Nemundo\Core\Debug\Debug;
use Nemundo\Design\Bootstrap\Document\BootstrapDocument;
use Nemundo\Design\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\App\Kvp\Data\KvpWorkflowStatus\KvpWorkflowStatusReader;
use Nemundo\App\Kvp\Form\KvpWorkflowStatusChangeForm;
use Nemundo\App\Kvp\Page\KvpNewPage;
use Nemundo\App\Kvp\Parameter\KvpParameter;
use Nemundo\App\Kvp\Parameter\KvpWorkflowStatusParameter;
use Nemundo\App\Kvp\Template\KvpTemplate;
use Nemundo\App\Task\Site\TaskItemSite;
use Nemundo\App\ToDo\Site\ToDoItemSite;
use Nemundo\Workflow\Com\WorkflowTitle;
use Nemundo\Workflow\Data\WorkflowStatus\WorkflowStatusReader;
use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusParameter;
use Nemundo\Com\Title\NemundoTitle;
use Nemundo\Template\NemundoTemplate;

class WorkflowStatusChangeSite extends AbstractSite
{

    /**
     * @var WorkflowStatusChangeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'status-change';
        $this->menuActive = false;
    }

    protected function registerSite()
    {
        WorkflowStatusChangeSite::$site = $this;
    }


    public function loadContent()
    {

        $workflowStatusId = (new WorkflowStatusParameter())->getValue();

        $workflowStatusRow = (new WorkflowStatusReader())->getRowById($workflowStatusId);
        $workflowStatus = $workflowStatusRow->getWorkflowStatusClassObject();

        $workflowParameter = new WorkflowParameter();
        $workflowId = $workflowParameter->getValue();

        if ($workflowStatus->modelClassName !== null) {

            $page = (new DefaultTemplateFactory())->getDefaultTemplate();

            $title = new WorkflowTitle($page);
            $title->workflowId = $workflowId;


            $form = null;
            if ($workflowStatus->formClassName !== null) {

                $form = new $workflowStatus->formClassName($page);
                $form->workflowId = $workflowId;

            } else {
                $form = new WorkflowForm($page);
                $form->workflowStatus = $workflowStatus;
                $form->workflowId = $workflowId;
                $form->redirectSite = clone(WorkflowItemSite::$site);
                $form->redirectSite->addParameter($workflowParameter);

            }





            //$form->redirectSite->addParameter($workflowStatus->parameter->setValue($workflowId));

            $page->render();


        } else {

            $workflowStatus->runWorkflow($workflowId);
            (new UrlReferer())->redirect();

        }

    }
}