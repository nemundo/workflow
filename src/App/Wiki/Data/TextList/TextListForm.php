<?php
namespace Nemundo\Workflow\App\Wiki\Data\TextList;
class TextListForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var TextListModel
*/
public $model;

protected function loadCom() {
$this->model = new TextListModel();
}
}