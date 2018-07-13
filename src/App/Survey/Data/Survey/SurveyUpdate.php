<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey;
use Nemundo\Model\Data\AbstractModelUpdate;
class SurveyUpdate extends AbstractModelUpdate {
/**
* @var SurveyModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SurveyModel();
}
public function update() {
parent::update();
}
}