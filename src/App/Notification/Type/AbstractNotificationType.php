<?php

namespace Nemundo\Workflow\App\Notification\Type;

use Nemundo\App\Content\Type\RedirectItemTrait;
use Nemundo\Core\Base\AbstractDataType;

abstract class AbstractNotificationType extends AbstractDataType
{

    use RedirectItemTrait;

    abstract public function getNotificationText($dataId);

}