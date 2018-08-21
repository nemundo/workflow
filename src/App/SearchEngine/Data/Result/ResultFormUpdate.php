<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
use Nemundo\Model\Form\ModelFormUpdate;
class ResultFormUpdate extends ModelFormUpdate {
/**
* @var ResultModel
*/
public $model;

protected function loadCom() {
$this->model = new ResultModel();
}
}