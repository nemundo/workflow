<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
use Nemundo\Model\View\ModelView;
class ResultView extends ModelView {
/**
* @var ResultModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ResultModel();
}
}