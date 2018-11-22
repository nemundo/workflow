<?php

namespace Nemundo\Workflow\App\Identification\Site;


use Nemundo\Web\Site\AbstractSite;

class IdentificationSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->url = 'identification';
        $this->menuActive = false;

        new UsergroupIdentificationSite($this);

    }

    public function loadContent()
    {
        // TODO: Implement loadContent() method.
    }

}