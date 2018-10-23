<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;


use Nemundo\Workflow\App\ContentTemplate\Content\Type\ImageTemplateContentType;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractModelDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class ImageWorkflowTemplateContentType extends AbstractModelDataWorkflowStatus  // ImageTemplateContentType
{

    protected function loadType()
    {
   $this->contentLabel = 'Image (Workflow Template)';
   $this->contentId = '';
    }


}