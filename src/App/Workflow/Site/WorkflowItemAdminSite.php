<?php

namespace Nemundo\Workflow\App\Workflow\Site;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeReader;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowModel;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowView;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\App\Workflow\Parameter\StatusChangeParameter;
use Nemundo\Workflow\App\Workflow\Site\Delete\StatusChangeDeleteSite;
use Nemundo\Workflow\Parameter\WorkflowParameter;

class WorkflowItemAdminSite extends AbstractSite
{

    /**
     * @var WorkflowItemAdminSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'item-admin';
        $this->menuActive = false;

        new StatusChangeDeleteSite($this);

    }


    protected function registerSite()
    {
        WorkflowItemAdminSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $workflowId = (new WorkflowParameter())->getValue();

        $view = new WorkflowView($page);
        $view->model = new WorkflowModel();
        $view->dataId = $workflowId;


        $statusChangeReader = new StatusChangeReader();
        $statusChangeReader->model->loadWorkflowStatus();
        $statusChangeReader->model->loadUser();
        $statusChangeReader->filter->andEqual($statusChangeReader->model->workflowId, $workflowId);

        foreach ($statusChangeReader->getData() as $statusChangeRow) {

            $title = new AdminSubtitle($page);
            $title->content = $statusChangeRow->workflowStatus->contentType;

            $contentType = $statusChangeRow->workflowStatus->getContentTypeClassObject();

            $item = $contentType->getItem($page);
            $item->dataId = $statusChangeRow->workflowItemId;


            $btn = new AdminButton($page);
            $btn->content = 'delete';
            $btn->site = StatusChangeDeleteSite::$site;
            $btn->site->addParameter(new StatusChangeParameter($statusChangeRow->id));


            /*
            $list->addHyperlink($statusChangeItem->workflowStatus->workflowStatus, '#' . $statusChangeItem->workflowItemId);

            $div = new Div($colRight);
            $div->addCssClass('card');
            $div->addCssClass('mb-3');


            $headerDiv = new Div($div);
            $headerDiv->addCssClass('card-header');
            $headerDiv->content = $statusChangeItem->workflowStatus->workflowStatus . ': ' . $statusChangeItem->user->displayName . ' ' . $statusChangeItem->dateTime->getShortDateTimeLeadingZeroFormat();

            $contentDiv = new Div($div);
            $contentDiv->addCssClass('card-body');

            $workflowStatus = $statusChangeItem->workflowStatus->getWorkflowStatusClassObject();

            $item = $workflowStatus->getItem($contentDiv);
            //$item->workflowStatus = $workflowStatus;
            $item->dataId = $statusChangeItem->workflowItemId;
//$item->workflowId = $statusChangeItem->workflowId;

            //$statusChangeItem->getView($contentDiv);

            //(new Debug())->write($item->getClassName());


            if ($statusChangeItem->draft) {

                $btn = new AdminButton($contentDiv);
                $btn->content = 'Bearbeiten';
                $btn->site = clone($this->statusChangeRedirectSite);
                $btn->site->addParameter(new WorkflowStatusParameter($statusChangeItem->workflowStatus->id));
                $btn->site->addParameter(new WorkflowParameter($this->workflowId));
                $btn->site->addParameter(new DraftEditParameter($statusChangeItem->workflowItemId));


                //if ($statusChangeItem->workflowStatus->isObjectOfClass(AbstractDataListWorkflowStatus::class)) {
                if ($workflowStatus->isObjectOfClass(AbstractDataListWorkflowStatus::class)) {
                    $btn = new DraftReleaseButton($contentDiv);
                    $btn->workflowId = $this->workflowId;
                }
            }*/

        }









        $page->render();

    }

}