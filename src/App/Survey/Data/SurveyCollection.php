<?php
namespace Nemundo\Workflow\App\Survey\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class SurveyCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Survey\Data\Survey\SurveyModel());
$this->addModel(new \Nemundo\Workflow\App\Survey\Data\Survey1\Survey1Model());
$this->addModel(new \Nemundo\Workflow\App\Survey\Data\Survey2\Survey2Model());
$this->addModel(new \Nemundo\Workflow\App\Survey\Data\Survey3\Survey3Model());
$this->addModel(new \Nemundo\Workflow\App\Survey\Data\SurveyLog\SurveyLogModel());
$this->addModel(new \Nemundo\Workflow\App\Survey\Data\UmfrageStart\UmfrageStartModel());
}
}