<?php

namespace Nemundo\Workflow\Com;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Model\View\ModelViewTrait;
use Schleuniger\Com\Table\SchleunigerLabelValueTable;

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

        $table = new SchleunigerLabelValueTable($this);

        foreach ($this->getComList() as $com) {
            $table->addLabelValue($com->type->label, $com->getHtmlString());
        }

        return parent::getHtml();

    }

}