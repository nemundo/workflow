<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\AbstractDataContentType;
use Nemundo\Workflow\App\ContentTemplate\Content\Form\LargeTextContentTemplateForm;
use Nemundo\Workflow\App\ContentTemplate\Data\LargeText\LargeTextModel;
use Nemundo\Workflow\App\ContentTemplate\Data\LargeText\LargeTextReader;
use Nemundo\Workflow\App\Workflow\Content\Type\WorkflowIdTrait;
use Schleuniger\Usergroup\SchleunigerUsergroup;

class LargeTextTemplateContentType extends AbstractDataContentType  // AbstractContentType
{

    //use WorkflowIdTrait;

    protected function loadData()
    {

        $this->name = 'Large Text (Template)';
        $this->id = '46e84be8-7173-41ff-8c7a-b7f91f33a0fb';
        $this->modelClass = LargeTextModel::class;
        //$this->formClass = LargeTextContentTemplateForm::class;

    }






}