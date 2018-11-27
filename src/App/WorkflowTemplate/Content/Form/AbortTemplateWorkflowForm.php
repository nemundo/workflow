<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Form;


use Nemundo\App\Content\Form\ContentTreeFormTrait;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Core\Event\EventTrait;

class AbortTemplateWorkflowForm extends AbstractHtmlContainerList
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