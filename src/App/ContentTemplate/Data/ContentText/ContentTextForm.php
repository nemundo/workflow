<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
class ContentTextForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var ContentTextModel
*/
public $model;

protected function loadCom() {
$this->model = new ContentTextModel();
}
}