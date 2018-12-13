<?php

namespace Nemundo\Workflow\App\Workflow\Site\Delete;


use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class WorkflowDeleteSite extends AbstractDeleteIconSite
{


    protected function loadSite()
    {

        $this->url = 'delete-workflow';

    }


    public function loadContent()
    {
        // TODO: Implement loadContent() method.
    }

}