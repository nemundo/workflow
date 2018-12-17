<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\App\Content\Type\Menu\MenuContentTypeTrait;
use Nemundo\App\Content\Type\Process\AbstractWorkflowProcess;
use Nemundo\App\Content\Type\Sequence\SequenceContentTypeTrait;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\User\Access\UserAccessTrait;


abstract class AbstractWorkflowStatus extends AbstractTreeContentType
{

    use UserAccessTrait;
    use SequenceContentTypeTrait;
    use MenuContentTypeTrait;
    use WorkflowStatusTrait;


    /**
     * @var AbstractWorkflowProcess
     */
    public $parentContentType;


    public function saveContentLog($draft = false)
    {

        //(new Debug())->write($this->getClassName());


        /*
        if ($this->parentContentType !== null) {

            $status = $this->parentContentType->getStatus();

            if ($status !== null) {

                (new Debug())->write('Status: '.$status->getClassName());

                $valid = false;

                $next = $status->getNextContentType();
                if ($next->getClassName() == $this->getClassName()) {

                    if ($next->checkUserVisibility()) {
                        $valid = true;
                    }
                }

                foreach ($status->getMenuContentType() as $menu) {
                    if ($menu->getClassName() == $this->getClassName()) {

                        if ($menu->checkUserVisibility()) {
                            $valid = true;
                        }
                    }
                }


                if (!$valid) {
                    (new LogMessage())->writeError('Workflow Operation not allowed');
                    (new LogMessage())->writeError('Please Refresh your browser');
                    exit;
                }

            }

        }*/


        parent::saveContentLog($draft);

    }


    /**
     * @param string $sortOrder
     * @return AbstractTreeContentType[]|AbstractWorkflowStatus[]
     */
    public function getChild($sortOrder = SortOrder::ASCENDING)
    {
        return parent::getChild($sortOrder);
    }

}