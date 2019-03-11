<?php

namespace Nemundo\Workflow\App\Workflow\Utility;


use Nemundo\Core\Date\DateTimeDifference;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;

class WorkflowTimeLeap
{

    /**
     * @var AbstractWorkflowProcess
     */
    private $process;


    private $excludeStatusList = [];

    public function __construct(AbstractWorkflowProcess $process)
    {
        $this->process = $process;
    }


    public function addExcludeStatus($workflowStatusClass)
    {

        $this->excludeStatusList[] = $workflowStatusClass;
        return $this;

    }


    public function getTimeLeapInDay()
    {

        $diff = new DateTimeDifference();
        $diff->dateFrom = clone($this->process->getFirstChild()->dateTimeCreated);
        $diff->dateFrom->resetTime();

        if ($this->process->isWorkflowClosed()) {

            foreach ($this->process->getChild() as $child) {

                if (!in_array($child->getClassName(), $this->excludeStatusList)) {
                    $diff->dateUntil = clone($child->dateTimeCreated);
                    $diff->dateUntil->resetTime();
                }

            }

        } else {

            $diff->dateUntil = (new DateTime())->setNow()->resetTime();

        }

        $day = $diff->getDifferenceInDay();

        return $day;

    }

}