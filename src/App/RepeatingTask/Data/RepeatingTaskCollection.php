<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class RepeatingTaskCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask\RepeatingTaskModel());
}
}