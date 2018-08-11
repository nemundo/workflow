<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
class ContentTemplateImageAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var ContentTemplateImageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  ContentTemplateImageModel();
}
}