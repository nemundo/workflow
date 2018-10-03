<?php

namespace Nemundo\Workflow\App\Wiki\Content\Form;


use Nemundo\App\Content\Form\ContentTreeForm;
use Nemundo\App\Content\Form\ContentTreeFormTrait;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Web\Site\Site;
use Nemundo\Workflow\App\Wiki\Content\Type\TextListType;
use Nemundo\Workflow\App\Wiki\Content\View\TextListView;
use Nemundo\Workflow\App\Wiki\Data\TextList\TextListForm;

class TextListTypeForm extends ContentTreeForm  // AbstractHtmlContainerList
{

    use ContentTreeFormTrait;

    /**
     * @var BootstrapTextBox
     */
    private $text;

    /**
     * @var string
     */
    private $dataId;

    public function getHtml()
    {

        $dataIdParameter = new DataIdParameter();
        //$dataId=null;

        if ($dataIdParameter->exists()) {
            $this->dataId = $dataIdParameter->getValue();
        }

        $this->text = new BootstrapTextBox($this);
        $this->text->label = 'Text';
        $this->text->autofocus = true;


        $view = new TextListView($this);
        $view->dataId = $this->dataId;


        return parent::getHtml(); // TODO: Change the autogenerated stub
    }


    protected function onSubmit()
    {


        $type = new TextListType($this->dataId);
        $type->parentContentType = $this->parentContentType;
        $type->addText($this->text->getValue());

        $this->redirectSite = new Site();
        $this->redirectSite->addParameter(new DataIdParameter($type->dataId));


    }


}