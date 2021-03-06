<?php

namespace Nemundo\Workflow\Com\View;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Model\View\ModelViewTrait;
use Nemundo\Package\Bootstrap\Table\BootstrapLabelValueTable;

class WorkflowModelView extends AbstractHtmlContainer
{

    use ModelViewTrait;

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->loadModelView();
    }

    public function getContent()
    {

        $table = new BootstrapLabelValueTable($this);
        $table->labelCellWidth = 200;
        $table->smallTable = true;

        foreach ($this->getComList() as $com) {
             $table->addLabelValue($com->type->label, $com->getContent());
        }

        return parent::getContent();

    }

}