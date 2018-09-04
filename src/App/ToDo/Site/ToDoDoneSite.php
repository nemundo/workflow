<?php

namespace Nemundo\Workflow\App\ToDo\Site;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Assignment\Builder\AssignmentArchive;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentUpdate;
use Nemundo\Workflow\App\Task\Item\TaskItem;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoUpdate;
use Nemundo\Workflow\App\ToDo\Parameter\ToDoParameter;

class ToDoDoneSite extends AbstractSite
{

    /**
     * @var ToDoDoneSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'done';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        ToDoDoneSite::$site= $this;
    }


    public function loadContent()
    {

        $todoId = (new ToDoParameter())->getValue();

        $update = new ToDoUpdate();
        $update->done = true;
        $update->updateById($todoId);


        (new AssignmentArchive())->archiveAssignment($todoId);




        (new UrlReferer())->redirect();

    }

}