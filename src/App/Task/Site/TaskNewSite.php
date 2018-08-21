<?php

namespace Nemundo\Workflow\App\Task\Site;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Task\Form\TaskBuilderForm;
use Nemundo\Workflow\App\Task\Process\TaskProcess;

class TaskNewSite extends AbstractSite
{


    /**
     * @var TaskNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'new';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        TaskNewSite::$site = $this;
    }


    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $form = new TaskBuilderForm($page);
        //$form->contentType = new TaskProcess();
        $form->redirectSite = TaskSite::$site;


        $page->render();

    }


}