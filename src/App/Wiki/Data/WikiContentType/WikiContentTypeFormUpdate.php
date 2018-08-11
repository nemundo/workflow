<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
use Nemundo\Model\Form\ModelFormUpdate;
class WikiContentTypeFormUpdate extends ModelFormUpdate {
/**
* @var WikiContentTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiContentTypeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}