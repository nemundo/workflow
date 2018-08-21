<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
class ResultForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var ResultModel
*/
public $model;

protected function loadCom() {
$this->model = new ResultModel();
}
}