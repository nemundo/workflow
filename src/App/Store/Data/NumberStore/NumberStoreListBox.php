<?php
namespace Nemundo\Workflow\App\Store\Data\NumberStore;
class NumberStoreListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var NumberStoreModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new NumberStoreModel();
$this->label = $this->model->label;
}
}