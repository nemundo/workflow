<?php

namespace Nemundo\Workflow\App\RepeatingTask\Site;

use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Task\Data\Task\TaskReader;
use Nemundo\Workflow\App\Task\Data\Task\TaskView;

class RepeatingTaskItemSite extends AbstractSite
{

    /**
     * @var RepeatingTaskItemSite
     */
    public static $site;


    protected function loadSite()
    {
        $this->title = 'RepeatingTaskItem';
        $this->url = 'repeatingtaskitem';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        RepeatingTaskItemSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $dataId = (new DataIdParameter())->getValue();

        $taskReader = new TaskReader();
        $taskReader->filter->andEqual($taskReader->model->dataId, $dataId);
        $taskRow = $taskReader->getRow();

        $title = new AdminTitle($page);
        $title->content = $taskRow->task;

        $view = new TaskView($page);
        $view->dataId = $taskRow->id;

        $btn = new AdminButton($page);
        $btn->content = 'Aufgabe erledigt';
        $btn->site = RepeatingTaskDoneSite::$site;
        $btn->site->addParameter(new DataIdParameter($dataId));


        // Repeating Task

        // Erledigte Task


        $page->render();


    }
}