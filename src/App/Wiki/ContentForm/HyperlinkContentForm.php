<?php

namespace Nemundo\Workflow\App\Wiki\ContentForm;


use Nemundo\Design\Bootstrap\Form\BootstrapForm;
use Nemundo\Design\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Workflow\App\Wiki\Data\Hyperlink\Hyperlink;

class HyperlinkContentForm extends BootstrapForm
{

    /**
     * @var BootstrapTextBox
     */
    private $url;

    public function getHtml()
    {

        $this->url = new BootstrapTextBox($this);
        $this->url->label = 'Url';
        $this->url->autofocus = true;

        return parent::getHtml();
    }


    protected function onSubmit()
    {

        $data = new Hyperlink();
        $data->url = $this->url->getValue();
        $data->title = 'title of url';
        $id = $data->save();

        $this->runAfterSubmitEvent($id);

        return $id;


    }


}