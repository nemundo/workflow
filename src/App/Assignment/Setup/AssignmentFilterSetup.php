<?php

namespace Nemundo\Workflow\App\Assignment\Setup;


use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Workflow\App\Assignment\Data\AssignmentFilter\AssignmentFilter;

class AssignmentFilterSetup extends AbstractBaseClass
{

    public function addContentType(AbstractContentType $contentType, $filterLabel = null)
    {

        $setup = new ContentTypeSetup();
        $setup->addContentType($contentType);

        if ($filterLabel == null) {
            $filterLabel = $contentType->contentLabel;
        }


        $data = new AssignmentFilter();
        $data->updateOnDuplicate = true;
        $data->contentTypeId = $contentType->contentId;
        $data->filterLabel = $filterLabel;
        $data->save();

    }

}