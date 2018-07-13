<?php

namespace Nemundo\Workflow\App\Workflow\ContentItem;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\Model\View\ModelViewTrait;


class WorkflowItemContentItem extends AbstractContentItem
{

    use ModelViewTrait;

    protected function loadCom()
    {
        parent::loadCom();
        $this->loadModelView();
    }

    public function getHtml()
    {

        $table = new AdminLabelValueTable($this);
        $table->labelCellWidth = 200;
        $table->smallTable = true;

        foreach ($this->getComList() as $com) {
            $table->addLabelValue($com->type->label, $com->getHtmlString());
        }

        return parent::getHtml();

    }

}