<?php

namespace Nemundo\Workflow\App\Survey\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\Model\ModelContentTypeTrait;
use Nemundo\App\Content\Type\Sequence\AbstractSequenceDataContentType;
use Nemundo\App\Content\Type\Sequence\AbstractSequenceTreeContentType;
use Nemundo\App\Content\View\DataModelContentView;
use Nemundo\Workflow\App\Survey\Data\Survey2\Survey2Model;
use Nemundo\Workflow\App\Survey\Data\SurveyLog\SurveyLog;

class Survey2ContentType extends AbstractSequenceTreeContentType  //DataContentType
{

    use ModelContentTypeTrait;


    protected function loadData()
    {
        $this->contentName = 'Survey2';
        $this->contentId = '19820505-fb0d-4948-afe2-a54a032bd4f8';
        $this->modelClass = Survey2Model::class;
        $this->viewClass = DataModelContentView::class;

        $this->nextContentTypeClass = Survey3ContentType::class;
$this->previousContentTypeClass = Survey1ContentType::class;


    }




    /*
    public function onCreate($dataId)
    {

        //$data = new Survey();
        //$surveyId = $data->save();

        $data = new SurveyLog();
        //$data->surveyId = $surveyId;
        $data->contentTypeId = $this->contentId;
        $data->dataId = $dataId;
        $data->save();



    }*/



}