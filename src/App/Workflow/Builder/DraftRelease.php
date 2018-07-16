<?php

namespace Nemundo\Workflow\App\Workflow\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeUpdate;

class DraftRelease extends AbstractBase
{


    public function releaseDraft($workflowId)
    {

        $update = new WorkflowStatusChangeUpdate();
        $update->filter->andEqual($update->model->workflowId, $workflowId);
        $update->draft = false;
        $update->update();

        $update = new WorkflowUpdate();
        $update->draft = false;
        $update->updateById($workflowId);

        $changeReader = new WorkflowStatusChangeReader();
        $changeReader->model->loadWorkflowStatus();
        $changeReader->filter->andEqual($changeReader->model->workflowId, $workflowId);
        $changeReader->addOrder($changeReader->model->itemOrder, SortOrder::DESCENDING);
        $changeRow = $changeReader->getRow();

        $changeEvent = new StatusChangeEvent();
        $changeEvent->workflowId = $workflowId;
        $changeEvent->workflowItemId = $changeRow->workflowItemId;
        $changeEvent->statusChangeId = $changeRow->id;

        $workflowStatus = $changeRow->workflowStatus->getWorkflowStatusClassObject();

        $workflowStatus->onChange($changeEvent);

    }

}