<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
use Nemundo\Model\Form\ModelFormUpdate;
class RepeatingTaskFormUpdate extends ModelFormUpdate {
/**
* @var RepeatingTaskModel
*/
public $model;

protected function loadCom() {
$this->model = new RepeatingTaskModel();
}
}