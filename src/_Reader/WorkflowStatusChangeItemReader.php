<?php

namespace Nemundo\Workflow\Reader;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Item\WorkflowStatusChangeItem;

class WorkflowStatusChangeItemReader extends AbstractDataSource
{

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var SortOrder
     */
    public $sortOrder = SortOrder::ASCENDING;

    // filter
    // sorting


    /**
     * @return WorkflowStatusChangeItem[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        $changeReader = new WorkflowStatusChangeReader();
        $changeReader->model->loadWorkflowStatus();
        $changeReader->model->loadUser();
        $changeReader->filter->andEqual($changeReader->model->workflowId, $this->workflowId);
        $changeReader->addOrder($changeReader->model->itemOrder, $this->sortOrder);
        foreach ($changeReader->getData() as $changeRow) {

            $item = new WorkflowStatusChangeItem();
            $item->workflowId = $this->workflowId;
            $item->workflowItemId = $changeRow->workflowItemId;
            $item->statusChangeId = $changeRow->id;
            $item->workflowStatus = $changeRow->workflowStatus->getWorkflowStatusClassObject();
            $item->dateTime = $changeRow->dateTime;
            $item->userRow = $changeRow->user;
            $item->draft = $changeRow->draft;

            $this->addItem($item);

        }

    }

}