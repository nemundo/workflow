<?php

namespace Nemundo\Workflow\App\Survey\Event;


use Nemundo\Core\Event\AbstractEvent;
use Nemundo\Workflow\App\Survey\Data\Survey\Survey;
use Nemundo\Workflow\App\Survey\Data\SurveyLog\SurveyLog;
use Nemundo\Workflow\App\Survey\Parameter\SurveyParameter;

class SurveyEvent extends AbstractEvent
{

    /**
     * @var string
     */
    public $surveyId;

    public function run($id)
    {

        if ($this->surveyId == null) {
            $data = new Survey();
            $surveyId = $data->save();
        }

        /* $surveyParameter = new SurveyParameter();
         if (!$surveyParameter->exists()) {
         }*/

        $data = new SurveyLog();
        $data->surveyId = $surveyId;
        $data->contentTypeId = $this->id;
        $data->dataId = $id;
        $data->save();



    }

}