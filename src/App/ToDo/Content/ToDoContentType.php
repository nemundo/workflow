<?php

namespace Nemundo\Workflow\App\ToDo\Content;


use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoReader;
use Nemundo\Workflow\App\ToDo\Parameter\ToDoParameter;
use Nemundo\Workflow\App\ToDo\Site\ToDoItemSite;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\Workflow\Content\Type\WorkflowIdTrait;
use Schleuniger\Usergroup\SchleunigerUsergroup;


class ToDoContentType extends AbstractContentType
{


    protected function loadType()
    {
        $this->contentName = 'To Do (todo)';
        $this->contentId = 'c9c9f07f-7608-49be-99b4-95c1aa07c69b';
        $this->viewClass = ToDoContentView::class;
        $this->viewSite = ToDoItemSite::$site;
        $this->parameterClass = ToDoParameter::class;
        $this->formClass = ToDoContentForm::class;
    }


    public function onCreate($dataId)
    {

        //(new Debug())->write('hello'.$dataId);
        //(new Debug())->write('hello'.$this->workflowId);

        /*
        exit;

        $row = (new ToDoReader())->getRowById($dataId);
        $this->createUsergroupInbox(new SchleunigerUsergroup(), $row->todo);
*/

    }

}