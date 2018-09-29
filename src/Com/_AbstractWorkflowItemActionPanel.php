<?php

namespace Nemundo\Workflow\Com;


use Nemundo\Web\Action\AbstractActionPanel;

abstract class AbstractWorkflowItemActionPanel extends AbstractActionPanel
{

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var string
     */
    public $workflowItemId;

}