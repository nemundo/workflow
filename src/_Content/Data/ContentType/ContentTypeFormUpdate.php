<?php
namespace Nemundo\App\Content\Data\ContentType;
use Nemundo\Model\Form\ModelFormUpdate;
class ContentTypeFormUpdate extends ModelFormUpdate {
/**
* @var ContentTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new ContentTypeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}