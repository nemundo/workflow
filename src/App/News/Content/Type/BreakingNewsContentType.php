<?php

namespace Nemundo\Workflow\App\News\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\News\Content\Form\BreakingNewsForm;
use Nemundo\Workflow\App\Stream\Builder\StreamBuilder;

class BreakingNewsContentType extends AbstractContentType
{

    protected function loadType()
    {
        $this->contentLabel = 'Breaking News';
        $this->contentId = 'c5f42b2c-2708-47ec-bce8-ab0110173a5e';
        $this->formClass = BreakingNewsForm::class;

    }


    public function onCreate($dataId)
    {

        $builder = new StreamBuilder();
        $builder->contentType = $this;
        $builder->createItem();

    }


}