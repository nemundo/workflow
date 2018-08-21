<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
class ResultAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var ResultModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  ResultModel();
}
}