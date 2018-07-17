<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
use Nemundo\Model\Form\ModelFormUpdate;
class ContentTemplateImageFormUpdate extends ModelFormUpdate {
/**
* @var ContentTemplateImageModel
*/
public $model;

protected function loadCom() {
$this->model = new ContentTemplateImageModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}