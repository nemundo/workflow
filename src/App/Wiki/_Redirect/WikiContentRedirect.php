<?php

namespace Nemundo\Workflow\App\Wiki\Redirect;


use Nemundo\Workflow\App\Wiki\Site\WikiSite;
use Nemundo\Workflow\Content\Redirect\AbstractContentRedirect;
use Nemundo\Workflow\Parameter\DataIdParameter;

class WikiContentRedirect extends AbstractContentRedirect
{

    protected function loadData()
    {

        $this->site = WikiSite::$site;
        $this->paramater = new DataIdParameter();

    }


}