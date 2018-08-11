<?php
namespace Nemundo\Workflow\App\Inbox\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class InboxCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Inbox\Data\Inbox\InboxModel());
}
}