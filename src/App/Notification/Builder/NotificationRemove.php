<?php

namespace Nemundo\Workflow\App\Notification\Builder;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Notification\Data\Notification\NotificationDelete;

class NotificationRemove extends AbstractBase
{

    public function removeAllNotification(AbstractContentType $contentType) {

        $delete = new NotificationDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, $contentType->contentId);
        $delete->delete();

    }

}