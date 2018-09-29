<?php
namespace Nemundo\Workflow\App\Task\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class TaskCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Task\Data\SourceTask\SourceTaskModel());
$this->addModel(new \Nemundo\Workflow\App\Task\Data\Task\TaskModel());
}
}