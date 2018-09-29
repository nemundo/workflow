<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
use Nemundo\Model\View\ModelView;
class RepeatingTaskView extends ModelView {
/**
* @var RepeatingTaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new RepeatingTaskModel();
}
}