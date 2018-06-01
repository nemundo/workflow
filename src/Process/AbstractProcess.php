<?php

namespace Nemundo\Workflow\Process;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Dev\Application\Type\AbstractApplication;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\WorkflowItemSite;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;


abstract class AbstractProcess extends AbstractBaseClass
{

    use UserAccessTrait;

    /**
     * @var string
     */
    public $process;

    /**
     * @var string
     */
    public $processId;

    /**
     * @var AbstractSite
     */
    public $site;

    /**
     * @var AbstractUrlParameter
     */
    public $parameter;

    /**
     * @var string
     */
    public $prefix;

    /**
     * @var string
     */
    public $baseModelClassName;

    /**
     * @var string
     */
    public $startWorkflowStatusClassName;


    abstract protected function loadProcess();

    public function __construct()
    {
        $this->site = WorkflowItemSite::$site;
        $this->parameter = new WorkflowParameter();
        $this->loadProcess();
    }


    public function getApplicationSite($dataId = null)
    {

        $site = clone($this->site);
        $site->addParameter($this->parameter->setValue($dataId));

        return $site;

    }


}