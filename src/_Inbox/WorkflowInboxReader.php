<?php

namespace Nemundo\Workflow\Inbox;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Workflow\Data\Workflow\WorkflowRow;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;

class WorkflowInboxReader extends AbstractDataSource
{

    use WorkflowInboxTrait;


    protected function loadData()
    {

        $workflowReader = new WorkflowReader();
        $this->loadReader($workflowReader);

        foreach ($workflowReader->getData() as $workflowRow) {
            $this->addItem($workflowRow);
        }

    }


    /**
     * @return WorkflowRow[]
     */
    public function getData()
    {
        return parent::getData();
    }


}