<?php
namespace Nemundo\Workflow\App\Wiki\Data\Wiki;
use Nemundo\Model\Form\ModelFormUpdate;
class WikiFormUpdate extends ModelFormUpdate {
/**
* @var WikiModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}