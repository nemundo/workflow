<?php
namespace Nemundo\Workflow\App\Store\Data\YesNoStore;
class YesNoStoreListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var YesNoStoreModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new YesNoStoreModel();
$this->label = $this->model->label;
}
}