<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
class WikiContentForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var WikiContentModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiContentModel();
}
}