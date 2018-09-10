<?php

namespace Nemundo\Workflow\App\Survey\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\Sequence\AbstractSequenceDataContentType;
use Nemundo\Workflow\App\Survey\Data\Survey2\Survey2Model;
use Nemundo\Workflow\App\Survey\Data\SurveyLog\SurveyLog;

class Survey2ContentType extends AbstractSequenceDataContentType
{

    protected function loadData()
    {
        $this->objectName = 'Survey2';
        $this->objectId = '19820505-fb0d-4948-afe2-a54a032bd4f8';
        $this->modelClass = Survey2Model::class;
        $this->nextContentTypeClass = Survey3ContentType::class;
    }

    public function onCreate($dataId)
    {

        //$data = new Survey();
        //$surveyId = $data->save();

        $data = new SurveyLog();
        //$data->surveyId = $surveyId;
        $data->contentTypeId = $this->objectId;
        $data->dataId = $dataId;
        $data->save();



    }



}