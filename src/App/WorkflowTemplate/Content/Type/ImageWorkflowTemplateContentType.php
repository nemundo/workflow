<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;


use Nemundo\Workflow\App\ContentTemplate\Content\Type\ImageTemplateContentType;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class ImageWorkflowTemplateContentType extends AbstractDataWorkflowStatus  // ImageTemplateContentType
{

    protected function loadData()
    {
   $this->objectName = 'Image (Workflow Template)';
   $this->objectId = '';
    }


}