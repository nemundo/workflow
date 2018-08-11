<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey;
class Survey extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SurveyModel
*/
protected $model;

public function __construct() {
parent::__construct();
$this->model = new SurveyModel();
}
public function save() {
$id = parent::save();
return $id;
}
}