<?php

namespace Nemundo\App\Content\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\App\Content\Data\ContentType\ContentType;
use Nemundo\App\Content\Type\AbstractContentType;

class ContentTypeSetup extends AbstractBase
{


    public function addContentType(AbstractContentType $contentType)
    {

        $data = new ContentType();
        $data->updateOnDuplicate = true;
        $data->id = $contentType->id;
        $data->contentType = $contentType->name;
        $data->contentTypeClass = $contentType->getClassName();
        $data->save();


    }


}