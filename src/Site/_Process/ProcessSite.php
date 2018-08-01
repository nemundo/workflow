<?php

namespace Nemundo\Workflow\Site\Process;


use Nemundo\Com\Html\Basic\H3;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Package\Bootstrap\Button\BootstrapButton;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\App\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Site\WorkflowNewSite;
use Nemundo\Workflow\Usergroup\WorkflowAdministratorUsergroup;
use Nemundo\Workflow\Widget\ProcessOverviewWidget;

class ProcessSite extends AbstractSite
{

    public function loadSite()
    {

        $this->title = 'Prozess Übersicht';
        $this->url = 'process';
        $this->restricted=true;
        $this->addRestrictedUsergroup(new WorkflowAdministratorUsergroup());

        new ProcessDescriptionSite($this);

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        new ProcessOverviewWidget($page);

        $page->render();

    }

}