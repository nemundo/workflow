<?php

namespace Nemundo\Workflow\App\ToDo\Content\View;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Workflow\App\ToDo\Content\Type\Process\ToDoProcess;

class ToDoView extends AbstractContentView
{

    /**
     * @var ToDoProcess
     */
    public $contentType;

    public function getHtml()
    {

        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('To Do', $this->contentType->toDo);
        $table->addLabelYesNoValue('Erledigt', $this->contentType->done);


        $btn = new AdminButton($this);
        $btn->content = 'More';
        $btn->site = $this->contentType->getViewSite();

        return parent::getHtml();

    }

}