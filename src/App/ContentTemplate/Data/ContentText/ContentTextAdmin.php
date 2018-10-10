<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
class ContentTextAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var ContentTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  ContentTextModel();
}
}