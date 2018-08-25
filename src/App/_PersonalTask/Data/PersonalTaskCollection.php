<?php
namespace Nemundo\Workflow\App\PersonalTask\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class PersonalTaskCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\PersonalTask\Data\Comment\CommentModel());
$this->addModel(new \Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskModel());
}
}