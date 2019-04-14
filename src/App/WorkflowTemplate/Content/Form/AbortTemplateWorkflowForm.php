<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Form;


use Nemundo\App\Content\Form\ContentTreeFormTrait;
use Nemundo\Com\FormBuilder\RedirectTrait;
use Nemundo\Html\Container\AbstractHtmlContainer;


class AbortTemplateWorkflowForm extends AbstractHtmlContainer
{

    use ContentTreeFormTrait;
    use RedirectTrait;
    //use EventTrait;

    public function getHtml()
    {

        $this->contentType->parentContentType = $this->parentContentType;
        $this->contentType->saveType();

        $this->checkRedirect();

        return parent::getHtml();

    }

}