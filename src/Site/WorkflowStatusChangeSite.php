<?php

namespace Nemundo\Workflow\Site;

use Nemundo\Core\Debug\Debug;
use Nemundo\Design\Bootstrap\Document\BootstrapDocument;
use Nemundo\Design\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Schleuniger\App\Kvp\Data\KvpWorkflowStatus\KvpWorkflowStatusReader;
use Schleuniger\App\Kvp\Form\KvpWorkflowStatusChangeForm;
use Schleuniger\App\Kvp\Page\KvpNewPage;
use Schleuniger\App\Kvp\Parameter\KvpParameter;
use Schleuniger\App\Kvp\Parameter\KvpWorkflowStatusParameter;
use Schleuniger\App\Kvp\Template\KvpTemplate;
use Schleuniger\App\Task\Site\TaskItemSite;
use Schleuniger\App\ToDo\Site\ToDoItemSite;
use Nemundo\Workflow\Data\WorkflowStatus\WorkflowStatusReader;
use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusParameter;
use Schleuniger\Com\Title\SchleunigerTitle;
use Schleuniger\Template\SchleunigerTemplate;

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

            $page = new BootstrapDocument();  // new SchleunigerTemplate();

            //$model = (new ModelFactory())->getModelByClassName($workflowStatus->modelClassName);

            $form = new WorkflowForm($page);
            //$form->workflowStatus = $workflowStatus;
            $form->workflowId = $workflowId;
            //$form->redirectSite = clone(ToDoItemSite::$site);

            $form->redirectSite = clone(TaskItemSite::$site);
            $form->redirectSite->addParameter($workflowStatus->parameter->setValue($workflowId));


            $page->render();


        } else {

            $workflowStatus->runWorkflow($workflowId);
            (new UrlReferer())->redirect();

        }

    }
}