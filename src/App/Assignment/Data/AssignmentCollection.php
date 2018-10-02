<?php
namespace Nemundo\Workflow\App\Assignment\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class AssignmentCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentModel());
$this->addModel(new \Nemundo\Workflow\App\Assignment\Data\AssignmentFilter\AssignmentFilterModel());
}
}