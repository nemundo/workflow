<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class SurveyTable extends BootstrapModelTable {
/**
* @var SurveyModel
*/
public $model;

protected function loadCom() {
$this->model = new SurveyModel();
}
}