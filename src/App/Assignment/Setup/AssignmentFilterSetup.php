<?php

namespace Nemundo\Workflow\App\Assignment\Setup;


use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Workflow\App\Assignment\Data\AssignmentFilter\AssignmentFilter;

class AssignmentFilterSetup extends AbstractBaseClass
{

    public function addContentType(AbstractContentType $contentType)
    {

        $setup = new ContentTypeSetup();
        $setup->addContentType($contentType);

        $data = new AssignmentFilter();
        $data->ignoreIfExists = true;
        $data->contentTypeId = $contentType->contentId;
        $data->save();

    }

}