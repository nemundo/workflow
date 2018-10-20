<?php


namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;


use Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile\TemplateFile;

trait DocumentStatusTrait
{

    //public $dataId;

    public function addFile($fileRequest) {

        $data =new  TemplateFile();
        $data->dataId = $this->dataId;
        $data->file->fromFileRequest($fileRequest);
        $data->save();

    }


    public function addMultiRequest($multiRequest) {




    }



    public function getFile() {

    }


}