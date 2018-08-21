<?php
namespace Nemundo\Workflow\Content\Data\ContentType;
class ContentTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var ContentTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  ContentTypeModel();
}
}