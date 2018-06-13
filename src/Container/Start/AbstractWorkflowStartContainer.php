<?php

namespace Nemundo\Workflow\Container\Start;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Process\AbstractProcess;

class AbstractWorkflowStartContainer extends AbstractHtmlContainerList
{

    /**
     * @var AbstractProcess
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