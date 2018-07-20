<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
class TitleChangeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var TitleChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  TitleChangeModel();
}
}