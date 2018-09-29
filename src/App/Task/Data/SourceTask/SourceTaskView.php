<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
use Nemundo\Model\View\ModelView;
class SourceTaskView extends ModelView {
/**
* @var SourceTaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SourceTaskModel();
}
}