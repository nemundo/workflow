<?php
namespace Nemundo\Workflow\App\TeamInbox\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class TeamInboxCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\TeamInbox\Data\TeamUser\TeamUserModel());
}
}