<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Form;


use Nemundo\App\Content\Form\ContentTreeForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\YouTubeType;

class YouTubeTypeForm extends ContentTreeForm
{

    /**
     * @var BootstrapTextBox
     */
    private $videoId;

    public function getHtml()
    {

        $this->videoId = new BootstrapTextBox($this);
        $this->videoId->label = 'YouTube Url';

        return parent::getHtml();


    }


   protected function onSubmit()
   {


       $type = new YouTubeType();
       $type->parentContentType = $this->parentContentType;
       $type->youTubeUrl = $this->videoId->getValue();
       $type->saveType();


   }


}