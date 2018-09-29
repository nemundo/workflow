<?php

namespace Nemundo\Workflow\App\Workflow\Content\Item;


use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeReader;


class SubjectWorkflowItem extends AbstractContentItem
{

    use WorkflowItemTrait;

    /**
     * @var string
     */
    public $itemText;

    public function getHtml()
    {

        $statusChangeReader = new StatusChangeReader();
        $statusChangeReader->model->loadWorkflowStatus();
        $statusChangeReader->filter->andEqual($statusChangeReader->model->dataId, $this->dataId);
        $statusChangeRow = $statusChangeReader->getRow();

        /** @var AbstractWorkflowStatus $contentType */
        $contentType = $statusChangeRow->workflowStatus->getContentTypeClassObject();

        $p = new Paragraph($this);
        $p->content = $contentType->getStatusText($this->dataId);

        return parent::getHtml();

    }

}