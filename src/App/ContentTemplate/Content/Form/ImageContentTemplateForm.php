<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Form;


use Nemundo\App\Content\Data\ContentLog\ContentLog;
use Nemundo\App\Content\Form\ContentTreeFormTrait;
use Nemundo\App\Content\Form\ContentTreeForm;
use Nemundo\Com\Html\Form\AcceptFileType;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\ImageTemplateContentType;


class ImageContentTemplateForm extends BootstrapForm  // ContentTreeForm
{

    use ContentTreeFormTrait;

    /**
     * @var BootstrapFileUpload
     */
    private $image;

    public function getHtml()
    {

        $this->image = new BootstrapFileUpload($this);
        $this->image->label = 'Image';
        $this->image->acceptFileType = AcceptFileType::IMAGE;

        return parent::getHtml();

    }


    protected function onSubmit()
    {


        /*
        $content = new ContentTemplateImage();  // TemplateImageContent();
        //$content->parentId = $this->parentId;
        $content->image->fromFileRequest($this->image->getFileRequest());
        $dataId = $content->save();



        $data = new ContentLog();
        $data->contentTypeId = (new ImageTemplateContentType())->contentId;  // $dataIdthis->id;
        $data->dataId = $dataId;

        if ($this->parentContentType !== null) {
            $data->parentId = $this->parentContentType->dataId;
        }

        $data->save();
*/


        //$this->afterSubmitEvent->run($dataId);  // runAfterSubmitEvent-> ($dataId);

        //return parent::onSubmit();

    }


}