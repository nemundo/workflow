<?php
namespace Nemundo\Workflow\App\Stream\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class StreamCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Stream\Data\Stream\StreamModel());
$this->addModel(new \Nemundo\Workflow\App\Stream\Data\StreamGroup\StreamGroupModel());
$this->addModel(new \Nemundo\Workflow\App\Stream\Data\StreamGroupMember\StreamGroupMemberModel());
$this->addModel(new \Nemundo\Workflow\App\Stream\Data\StreamNotification\StreamNotificationModel());
$this->addModel(new \Nemundo\Workflow\App\Stream\Data\StreamType\StreamTypeModel());
}
}