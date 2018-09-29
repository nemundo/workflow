<?php

namespace Nemundo\Workflow\App\Notification\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Notification\Data\NotificationType\NotificationType;
use Nemundo\Workflow\App\Notification\Type\AbstractNotificationType;

class NotificationSetup extends AbstractBase
{

    public function addNotificationType(AbstractNotificationType $notificationType)
    {

        $data = new NotificationType();
        $data->updateOnDuplicate = true;
        $data->id = $notificationType->id;
        $data->notificationType = $notificationType->getClassName();
        $data->save();

    }

}