<?php

namespace Nemundo\Workflow\App\Wiki\Setup;


use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Content\Type\AbstractBaseContentType;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\Wiki\Data\WikiContentType\WikiContentType;

class WikiContentTypeSetup extends ContentTypeSetup
{

    public function addContentType(AbstractBaseContentType $contentType)
    {

        $data = new WikiContentType();
        $data->updateOnDuplicate = true;
        $data->id = $contentType->objectId;
        $data->contentType = $contentType->objectName;
        $data->contentTypeClass = $contentType->getClassName();
        $data->save();

        parent::addContentType($contentType);

    }

}