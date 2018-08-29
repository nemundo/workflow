<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
class SourceTaskAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var SourceTaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  SourceTaskModel();
}
}