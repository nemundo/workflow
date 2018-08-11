<?php

namespace Nemundo\Workflow\App\Workflow\Site\Process;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Basic\H3;
use Nemundo\Com\Html\Basic\Hr;
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
        //$this->restricted=true;
        //$this->addRestrictedUsergroup(new WorkflowAdministratorUsergroup());

        new ProcessDescriptionSite($this);

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $reader = new ProcessReader();

        foreach ($reader->getData() as $processRow) {


            $process = $processRow->getProcessClassObject();

            $title = new AdminTitle($page);
            $title->content = $process->name;

            $p = new Paragraph($page);
            $p->content = $process->description;

            $btn = new AdminButton($page);
            $btn->content = 'Weiter';
            $btn->site = clone(ProcessDescriptionSite::$site);
            $btn->site->addParameter(new ProcessParameter($processRow->id));

            //$process->getForm($page);


            (new Hr($page));

        }


        $page->render();

    }

}