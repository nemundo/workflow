<?php

namespace Nemundo\Workflow\Container\Change;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class AbstractWorkflowChangeContainer extends AbstractHtmlContainerList
{

    /**
     * @var AbstractWorkflowStatus
     */
    public $workflowStatus;

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var AbstractSite
     */
    public $redirectSite;


}