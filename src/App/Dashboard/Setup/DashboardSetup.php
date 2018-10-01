<?php

namespace Nemundo\Workflow\App\Dashboard\Setup;


use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Workflow\App\Dashboard\Data\DashboardContentType\DashboardContentType;

class DashboardSetup extends AbstractBaseClass
{

    public function addContentType(AbstractContentType $contentType)
    {

        $setup = new ContentTypeSetup();
        $setup->addContentType($contentType);


        $data = new DashboardContentType();
        $data->ignoreIfExists = true;
        $data->contentTypeId = $contentType->contentId;
        $data->save();

    }


    public function removeContentType(AbstractContentType $contentType)
    {

    }


}