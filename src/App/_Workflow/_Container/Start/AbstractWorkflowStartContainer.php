<?php

namespace Nemundo\Workflow\App\Workflow\Container\Start;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Process\AbstractModelProcess;

class AbstractWorkflowStartContainer extends AbstractHtmlContainerList
{

    /**
     * @var AbstractModelProcess
     */
    public $process;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    /**
     * @var bool
     */
    public $appendWorkflowParameter = false;

}