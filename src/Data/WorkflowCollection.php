<?php
namespace Nemundo\Workflow\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WorkflowCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\Data\Workflow\WorkflowModel());
}
}