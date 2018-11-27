<?php

namespace Nemundo\Workflow\App\Wiki\Content\Type;


use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;

class LargeTextWikiContentType extends LargeTextTemplateContentType
{

    use WikiContentTypeTrait;


    protected function loadType()
    {
        parent::loadType();


        $this->largeTextLabel = 'Wiki Text';

    }


    public function saveType()
    {
        parent::saveType();

        $this->saveWikiContent();


    }

}