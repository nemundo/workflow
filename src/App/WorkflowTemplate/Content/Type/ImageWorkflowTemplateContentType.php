<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;


use Nemundo\Workflow\App\ContentTemplate\Content\Type\ImageTemplateContentType;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractModelDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class ImageWorkflowTemplateContentType extends AbstractModelDataWorkflowStatus  // ImageTemplateContentType
{

    protected function loadData()
    {
   $this->contentName = 'Image (Workflow Template)';
   $this->contentId = '';
    }


}