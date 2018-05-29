<?php

namespace Nemundo\Workflow\Com;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Design\Bootstrap\Table\BootstrapLabelValueTable;
use Nemundo\Model\View\ModelViewTrait;
use Nemundo\Com\Table\NemundoLabelValueTable;

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

        foreach ($this->getComList() as $com) {
            $table->addLabelValue($com->type->label, $com->getHtmlString());
        }

        return parent::getHtml();

    }

}