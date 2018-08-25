<?php

namespace Nemundo\Workflow\App\Workflow\Com\Doc;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\App\Workflow\Factory\WorkflowStatusFactory;


// ProcessDoc
class WorkflowDoc extends AbstractHtmlContainerList
{

    /**
     * @var AbstractProcess
     */
    public $process;

    public function getHtml()
    {

        $status =$this->process->getStartWorkflowStatus();

            //(new WorkflowStatusFactory())->getWorkflowStatus($this->process->startWorkflowStatusClass);

        $list = new UnorderedList($this);


        do {

            $list->addText($status->name);
            $status = $status->getNextContentType();  // getFollowingStatusClassList();

            /*
            if (isset($class[0])) {

                $status = $class[0];
                //$list->addText($status->name);
            } else {
                $status = null;
            }*/

        } while ($status !== null);


        /*
                $class = $status->getFollowingStatusClassList();
                $status = $class[0];
                $list->addText($status->name);*/


        return parent::getHtml();

    }

}