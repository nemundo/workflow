<?php

namespace Nemundo\Workflow\App\RepeatingTask\Site;


use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Task\Builder\TaskBuilder;
use Nemundo\Workflow\App\Task\Item\TaskItem;

class RepeatingTaskDoneSite extends AbstractSite
{

    /**
     * @var RepeatingTaskDoneSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'done';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        RepeatingTaskDoneSite::$site = $this;
    }


    public function loadContent()
    {


        $dataId = (new DataIdParameter())->getValue();
        (new TaskItem($dataId))->archiveTask();

        (new UrlReferer())->redirect();


    }


}