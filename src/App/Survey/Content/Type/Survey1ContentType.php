<?php

namespace Nemundo\Workflow\App\Survey\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\Model\ModelContentTypeTrait;
use Nemundo\App\Content\Type\Sequence\AbstractMultiSequenceContentType;
use Nemundo\App\Content\Type\Sequence\AbstractMultiSequenceDataContentType;
use Nemundo\App\Content\Type\Sequence\AbstractSequenceContentType;
use Nemundo\App\Content\Type\Sequence\AbstractSequenceModelDataTreeContentType;
use Nemundo\App\Content\Type\Sequence\AbstractSequenceTreeContentType;
use Nemundo\App\Content\Type\Sequence\SequenceContentTypeTrait;
use Nemundo\App\Content\View\DataModelContentView;
use Nemundo\Workflow\App\Survey\Content\Form\Survey1ContentForm;
use Nemundo\Workflow\App\Survey\Data\Survey\Survey;
use Nemundo\Workflow\App\Survey\Data\Survey1\Survey1Model;
use Nemundo\Workflow\App\Survey\Data\SurveyLog\SurveyLog;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractModelDataWorkflowStatus;

class Survey1ContentType extends AbstractModelDataWorkflowStatus  // AbstractSequenceTreeContentType   //ContentType   // AbstractMultiSequenceDataContentType  // AbstractSequenceDataContentType  // AbstractSequenceContentType  //ContentType
{

 //   use SequenceTrait;

    use ModelContentTypeTrait;

    protected function loadData()
    {
        $this->contentName = 'Survey1';
        $this->contentId = '53cf8b66-a073-4b0f-bdaf-c0490680eb0b';
        $this->modelClass = Survey1Model::class;

        //$this->formClass = Survey1ContentForm::class;

        $this->viewClass = DataModelContentView::class;
        $this->nextContentTypeClass = Survey2ContentType::class;

        //$this->addFollowingContentTypeClass(Survey2ContentType::class);
        //$this->addFollowingContentTypeClass(Survey3ContentType::class);


    }



    public function saveType()
    {
        // TODO: Implement saveItem() method.
    }


    /*

    public function onCreate($dataId)
    {

        $data = new Survey();
        $surveyId = $data->save();

        $data = new SurveyLog();
        $data->surveyId = $surveyId;
        $data->contentTypeId = $this->contentId;
        $data->dataId = $dataId;
        $data->save();


    }*/


}