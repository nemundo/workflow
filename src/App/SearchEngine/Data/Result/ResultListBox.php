<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
class ResultListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var ResultModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ResultModel();
$this->label = $this->model->label;
}
}