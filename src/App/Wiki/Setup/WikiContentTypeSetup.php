<?php

namespace Nemundo\Workflow\App\Wiki\Setup;


use Nemundo\App\Content\Setup\ContentTypeSetup;


class WikiContentTypeSetup extends ContentTypeSetup
{

    /*
    public function addContentType(AbstractBaseContentType $contentType)
    {

        $data = new WikiContentType();
        $data->updateOnDuplicate = true;
        $data->id = $contentType->contentId;
        $data->contentType = $contentType->contentName;
        $data->contentTypeClass = $contentType->getClassName();
        $data->save();

        parent::addContentType($contentType);

    }*/

}