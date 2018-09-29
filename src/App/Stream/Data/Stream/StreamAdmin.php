<?php
namespace Nemundo\Workflow\App\Stream\Data\Stream;
class StreamAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var StreamModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  StreamModel();
}
}