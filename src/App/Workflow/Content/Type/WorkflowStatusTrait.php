<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


trait WorkflowStatusTrait
{

    /**
     * @var bool
     */
    public $changeStatus = true;

    /**
     * @var bool
     */
    public $closingWorkflow = false;

    /**
     * @var bool
     */
    public $showMenu = true;

    /**
     * @var bool
     */
    public $showLog = true;
// showHistory


}