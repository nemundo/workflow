<?php

namespace Nemundo\Workflow\App\Workflow\Container\Change;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataListWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class AbstractWorkflowChangeContainer extends AbstractHtmlContainerList
{

    /**
     * @var AbstractWorkflowStatus|AbstractDataListWorkflowStatus
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

    /**
     * @var bool
     */
    public $redirectToItemSite = false;

}