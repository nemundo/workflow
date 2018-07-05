<?php

namespace Nemundo\Workflow\App\Wiki\Site;


use Nemundo\Web\Site\AbstractSite;

class WikiItemDeleteSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->url = 'item-delete';
        $this->menuActive = false;
    }


    public function loadContent()
    {




    }

}