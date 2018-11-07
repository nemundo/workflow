<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type\File;


use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Data\File\FileReader;

class FileDeleteTemplateStatus extends AbstractWorkflowStatus
{


    protected function loadType()
    {
        $this->contentLabel = 'File löschen';
        $this->contentId = 'a20b2be1-dd69-4e7c-abc4-d3ff579ce2cd';

        $this->changeStatus = false;
        $this->showMenu = false;

    }


    protected function loadData()
    {


    }

    public function getSubject()
    {

        $row = (new FileReader())->getRowById($this->dataId);
        $subject = $row->file->getFilename() . ' wurde gelöscht';

        return $subject;

    }

}