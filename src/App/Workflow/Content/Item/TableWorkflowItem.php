<?php

namespace Nemundo\Workflow\App\Workflow\Content\Item;


use App\App\LoginRequest\Data\LoginUsergroup\LoginUsergroupModel;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;

class TableWorkflowItem extends WorkflowItem
{



    public function getHtml()
    {

        $table = new BootstrapModelTable($this);
        $table->model = new LoginUsergroupModel();
        $table->filter->andEqual($table->model->workflowId, $this->workflowId);


        return parent::getHtml();
    }


}