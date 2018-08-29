<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
use Nemundo\Model\Form\ModelFormUpdate;
class SourceTaskFormUpdate extends ModelFormUpdate {
/**
* @var SourceTaskModel
*/
public $model;

protected function loadCom() {
$this->model = new SourceTaskModel();
}
}