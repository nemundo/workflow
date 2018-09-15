<?php
namespace Nemundo\Workflow\App\Wiki\Data\TextList;
class TextListAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var TextListModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  TextListModel();
}
}