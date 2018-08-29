<?php

namespace Nemundo\Workflow\App\Workflow\Site\Delete;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeDelete;
use Nemundo\Workflow\App\Workflow\Parameter\StatusChangeParameter;

class StatusChangeDeleteSite extends AbstractSite
{

    /**
     * @var StatusChangeDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'change-delete';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        StatusChangeDeleteSite::$site = $this;
    }


    public function loadContent()
    {

        $statusChangeId = (new StatusChangeParameter())->getValue();

        $delete = new StatusChangeDelete();
        $delete->deleteById($statusChangeId);

        (new UrlReferer())->redirect();

    }

}