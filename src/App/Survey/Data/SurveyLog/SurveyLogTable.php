<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class SurveyLogTable extends BootstrapModelTable {
/**
* @var SurveyLogModel
*/
public $model;

protected function loadCom() {
$this->model = new SurveyLogModel();
}
}