<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
class ImageContentTemplateAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var ImageContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  ImageContentTemplateModel();
}
}