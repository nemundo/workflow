<?php
namespace Nemundo\Workflow\App\ToDo\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ToDoCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoModel());
}
}