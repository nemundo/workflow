<?php

namespace Nemundo\Workflow\App\PersonalTask\Site;

use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\App\PersonalTask\Process\PersonalTaskProcess;
use Nemundo\Workflow\App\Task\Site\TaskSite;
use Nemundo\Workflow\App\Workflow\Form\Start\WorkflowStartForm;
use Schleuniger\App\Task\Template\TaskTemplate;
use Schleuniger\Usergroup\SchleunigerUsergroup;
use Nemundo\Web\Site\AbstractSite;
use Schleuniger\App\Task\Page\TaskItemPage;
use Schleuniger\App\Task\Page\TaskNewPage;
use Nemundo\Workflow\Com\View\WorkflowViewList;
use Schleuniger\App\Task\Process\TaskProcess;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;

class PersonalTaskNewSite extends AbstractSite
{

    /**
     * @var PersonalTaskNewSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'personal-task-new';
        $this->menuActive = false;
        //$this->restricted = true;
        //$this->addRestrictedUsergroup(new SchleunigerUsergroup());

    }

    protected function registerSite()
    {
        PersonalTaskNewSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $form = (new PersonalTaskProcess())->getForm($page);
        $form->redirectSite = TaskSite::$site;

        /*$form = new WorkflowStartForm($page);
        $form->process = new PersonalTaskProcess();
        $form->redirectSite = TaskSite::$site;*/

        $page->render();


    }
}