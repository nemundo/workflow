<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\App\Content\Type\Menu\MenuContentTypeTrait;
use Nemundo\App\Content\Type\Sequence\SequenceContentTypeTrait;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\User\Access\UserAccessTrait;


abstract class AbstractWorkflowStatus extends AbstractTreeContentType
{

    use UserAccessTrait;
    use SequenceContentTypeTrait;
    use MenuContentTypeTrait;
    use WorkflowStatusTrait;


    /*
        public function getForm($parentItem = null)
        {

            $div = new Div($parentItem);
            $div->addCssClass('jumbotron');

            return parent::getForm($div);

        }*/

    /**
     * @param string $sortOrder
     * @return AbstractTreeContentType[]|AbstractWorkflowStatus[]
     */
    public function getChild($sortOrder = SortOrder::ASCENDING)
    {
        return parent::getChild($sortOrder);
    }

}