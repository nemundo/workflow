<?php
namespace Nemundo\Workflow\App\Subscription\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class SubscriptionCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Subscription\Data\Subscription\SubscriptionModel());
}
}