<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Form;


use Nemundo\App\Content\Form\ContentTreeFormTrait;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Core\Event\EventTrait;

class AbortTemplateWorkflowForm extends AbstractHtmlContainer
{

    use ContentTreeFormTrait;
    use EventTrait;

    public function getHtml()
    {

        $this->contentType->parentContentType = $this->parentContentType;
        $this->contentType->saveType();

        $this->checkRedirect();

        return parent::getHtml();

    }

}