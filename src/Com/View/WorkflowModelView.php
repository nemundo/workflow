<?php

namespace Nemundo\Workflow\Com\View;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Package\Bootstrap\Table\BootstrapLabelValueTable;
use Nemundo\Model\View\ModelViewTrait;

class WorkflowModelView extends AbstractHtmlContainerList
{

    use ModelViewTrait;

    protected function loadCom()
    {
        parent::loadCom();
        $this->loadModelView();
    }

    public function getHtml()
    {

        $table = new BootstrapLabelValueTable($this);
        $table->labelCellWidth = 200;
        $table->smallTable = true;

        foreach ($this->getComList() as $com) {
            $table->addLabelValue($com->type->label, $com->getHtmlString());
        }

        return parent::getHtml();

    }

}