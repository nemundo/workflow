<?php

namespace Nemundo\Workflow\App\Inbox\Site;

use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxUpdate;

class ContentTypeArchiveSite extends AbstractSite
{

    /**
     * @var ContentTypeArchiveSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'ContentTypeArchive';
        $this->url = 'content-type-delete';
    }


    protected function registerSite()
    {
        ContentTypeArchiveSite::$site = $this;
    }


    public function loadContent()
    {

        $update = new InboxUpdate();
        $update->archive = true;
        $update->filter->andEqual($update->model->contentTypeId, (new ContentTypeParameter())->getValue());
        $update->update();

        InboxSite::$site->redirect();

    }
}