<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Type;


use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Web\Http\FileRequest\FileRequest;
use Nemundo\Workflow\App\ContentTemplate\Content\Form\TemplateFileTypeForm;
use Nemundo\Workflow\App\ContentTemplate\Content\View\FileContentView;
use Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile\TemplateFile;
use Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile\TemplateFileReader;


// TemplateFileContentType
// FileTemplateType
class TemplateFileType extends AbstractTreeContentType
{


    protected function loadType()
    {
        $this->contentLabel = 'Datei';
        $this->contentId = 'b1610c3e-4d39-4b53-b126-d026930e1701';
        $this->viewClass = FileContentView::class;
        $this->formClass = TemplateFileTypeForm::class;

    }


    public function fromFilename($filename)
    {

        $data = new TemplateFile();
        $data->file->fromFilename($filename);
        $this->dataId = $data->save();

        $this->saveContentLog();

    }

    public function fromFileRequest(FileRequest $fileRequest)
    {

        $data = new TemplateFile();
        $data->file->fromFileRequest($fileRequest);
        $this->dataId = $data->save();

        $this->saveContentLog();

    }


    public function getSubject()
    {

        $row = (new TemplateFileReader())->getRowById($this->dataId);
        $subject = $row->file->getFilename();

        return $subject;

    }


}