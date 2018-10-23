<?php

namespace Nemundo\Workflow\App\Survey\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\AbstractDataListContentType;
use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\App\Content\Type\Model\ModelContentTypeTrait;
use Nemundo\App\Content\Type\Sequence\AbstractSequenceContentType;
use Nemundo\App\Content\Type\Sequence\SequenceContentTypeTrait;
use Nemundo\Workflow\App\Survey\Content\Form\Survey3ContentForm;
use Nemundo\Workflow\App\Survey\Content\Item\Survey3ContentView;
use Nemundo\Workflow\App\Survey\Data\Survey3\Survey3Model;

class Survey3ContentType extends AbstractTreeContentType   // AbstractContentType  // DataListContentType  // AbstractSequenceContentType
{


    use SequenceContentTypeTrait;
    use ModelContentTypeTrait;

    protected function loadType()
    {
        $this->contentLabel = 'Survey3';
        $this->contentId = 'bc7d6589-3313-4c07-a621-cb397dd1025f';
        $this->modelClass = Survey3Model::class;
        //$this->formClass = Survey3ContentForm::class;
        //$this->itemClass = Survey3ContentItem::class;
    }

}