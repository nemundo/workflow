<?php

namespace Nemundo\Workflow\App\Notification\Setup;


use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Notification\Data\Notification\NotificationDelete;
use Nemundo\Workflow\App\Notification\Data\NotificationFilter\NotificationFilter;

class NotificationSetup extends AbstractBase
{

    public function addContentType(AbstractContentType $contentType)
    {

        $setup = new ContentTypeSetup();
        $setup->addContentType($contentType);

        $data = new NotificationFilter();
        $data->ignoreIfExists = true;
        $data->contentTypeId = $contentType->contentId;
        $data->save();

    }


    public function removeContentType(AbstractContentType $contentType)
    {

        $delete = new NotificationDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, $contentType->contentId);
        $delete->delete();

    }



}