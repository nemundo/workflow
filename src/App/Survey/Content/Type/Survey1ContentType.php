<?php

namespace Nemundo\Workflow\App\Survey\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\Sequence\AbstractMultiSequenceContentType;
use Nemundo\App\Content\Type\Sequence\AbstractMultiSequenceDataContentType;
use Nemundo\App\Content\Type\Sequence\AbstractSequenceContentType;
use Nemundo\App\Content\Type\Sequence\AbstractSequenceDataContentType;
use Nemundo\App\Content\Type\Sequence\SequenceTrait;
use Nemundo\Workflow\App\Survey\Content\Form\Survey1ContentForm;
use Nemundo\Workflow\App\Survey\Data\Survey\Survey;
use Nemundo\Workflow\App\Survey\Data\Survey1\Survey1Model;
use Nemundo\Workflow\App\Survey\Data\SurveyLog\SurveyLog;

class Survey1ContentType extends AbstractMultiSequenceDataContentType  // AbstractSequenceDataContentType  // AbstractSequenceContentType  //ContentType
{

 //   use SequenceTrait;

    protected function loadData()
    {
        $this->objectName = 'Survey1';
        $this->objectId = '53cf8b66-a073-4b0f-bdaf-c0490680eb0b';
        $this->modelClass = Survey1Model::class;

        //$this->formClass = Survey1ContentForm::class;

        $this->nextContentTypeClass = Survey2ContentType::class;

        $this->addFollowingContentTypeClass(Survey2ContentType::class);
        $this->addFollowingContentTypeClass(Survey3ContentType::class);


    }


    public function onCreate($dataId)
    {

        $data = new Survey();
        $surveyId = $data->save();

        $data = new SurveyLog();
        $data->surveyId = $surveyId;
        $data->contentTypeId = $this->objectId;
        $data->dataId = $dataId;
        $data->save();


    }


}