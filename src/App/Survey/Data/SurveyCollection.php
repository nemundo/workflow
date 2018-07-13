<?php
namespace Nemundo\Workflow\App\Survey\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class SurveyCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Survey\Data\Survey\SurveyModel());
$this->addModel(new \Nemundo\Workflow\App\Survey\Data\SurveyLog\SurveyLogModel());
$this->addModel(new \Nemundo\Workflow\App\Survey\Data\UmfrageStart\UmfrageStartModel());
}
}