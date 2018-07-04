<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
class WikiPageForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var WikiPageModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiPageModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}