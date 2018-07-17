<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeText;
class LargeTextAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var LargeTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  LargeTextModel();
}
}