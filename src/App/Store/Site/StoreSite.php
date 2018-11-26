<?php

namespace Nemundo\Workflow\App\Store\Site;

use Nemundo\Web\Site\AbstractSite;

class StoreSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Store';
        $this->url = 'store';
        $this->menuActive = false;

        new TextStoreEditSite($this);
        new HtmlStoreEditSite($this);

    }

    public function loadContent()
    {
    }
}