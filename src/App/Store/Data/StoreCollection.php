<?php
namespace Nemundo\Workflow\App\Store\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class StoreCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Store\Data\LargeTextStore\LargeTextStoreModel());
$this->addModel(new \Nemundo\Workflow\App\Store\Data\NumberStore\NumberStoreModel());
$this->addModel(new \Nemundo\Workflow\App\Store\Data\TextStore\TextStoreModel());
}
}