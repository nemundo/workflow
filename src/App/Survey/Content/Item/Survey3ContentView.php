<?php

namespace Nemundo\Workflow\App\Survey\Content\Item;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\App\Survey\Data\Survey3\Survey3Table;

class Survey3ContentView extends AbstractContentView
{

    public function getHtml()
    {
      //  $p = new Paragraph($this);
      //  $p->content = '123123123123';


        $table = new Survey3Table($this);
        $table->filter->andEqual($table->model->dataId, $this->dataId);

        return parent::getHtml();
    }

}