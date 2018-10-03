<?php

namespace Nemundo\Workflow\App\Workflow\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Model\Delete\ModelDelete;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndexDelete;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeDelete;
use Nemundo\Workflow\Data\UserNotification\UserNotificationDelete;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeDelete;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\App\Workflow\Factory\WorkflowDataId;


// extens Workflow
class WorkflowDelete extends AbstractBase
{


    public function deleteWorkflow($workflowId)
    {

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadProcess();
        $workflowRow = $workflowReader->getRowById($workflowId);
        $process = $workflowRow->process->getProcessClassObject();

        $dataId = $workflowId;  // (new WorkflowDataId())->getDataId($workflowId);

        $model = (new ModelFactory())->getModelByClassName($process->modelClass);

        $delete = new ModelDelete();
        $delete->model = $model;
        $delete->deleteById($dataId);

        /*
        $statusChangeReader = new WorkflowStatusChangeReader();
        $statusChangeReader->filter->andEqual($statusChangeReader->model->workflowId, $workflowId);
        foreach ($statusChangeReader->getData() as $statusChangeRow) {
            $delete = new UserNotificationDelete();
            $delete->model->loadStatusChange();
            $delete->filter->andEqual($delete->model->statusChangeId, $statusChangeRow->id);
            $delete->delete();
        }*/

        $delete = new StatusChangeDelete();  //:: new WorkflowStatusChangeDelete();
        $delete->filter->andEqual($delete->model->workflowId, $workflowId);
        $delete->delete();


        (new \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowDelete())->deleteById($workflowId);


        // Search Index
        /*$delete = new SearchIndexDelete();
        $delete->filter->andEqual($delete->model->workflowId, $workflowId);
        $delete->delete();*/

        // Task Delete

        // Inbox Delete



    }

}