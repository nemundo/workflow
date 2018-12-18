<?php

namespace Nemundo\Workflow\App\Workflow\Site\Delete;


use Nemundo\App\Content\Data\ContentLog\ContentLogReader;
use Nemundo\App\Content\Parameter\ContentLogParameter;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Web\Url\UrlReferer;

class WorkflowStatusDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var WorkflowStatusDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'delete-status';
    }


    protected function registerSite()
    {
        WorkflowStatusDeleteSite::$site=$this;
    }


    public function loadContent()
    {

        $reader= new ContentLogReader();
        $row = $reader->getRowById((new ContentLogParameter())->getValue());

        $className = $row->contentType->contentTypeClass;

        /** @var AbstractContentType $contentType */
        $contentType = new $className($row->dataId);
        $contentType->deleteType();

        (new UrlReferer())->redirect();

    }

}