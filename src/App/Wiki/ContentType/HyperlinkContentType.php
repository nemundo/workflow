<?php

namespace Nemundo\Workflow\App\Wiki\ContentType;


use Nemundo\Workflow\App\Wiki\ContentForm\HyperlinkContentForm;
use Nemundo\Workflow\Content\Type\AbstractContentType;

class HyperlinkContentType extends AbstractContentType
{

    protected function loadData()
    {

        $this->name = 'Hyperlink';
        $this->id = '855391b8-6291-49ee-9e72-7f24277adf2e';
        $this->formClass = HyperlinkContentForm::class;

    }

}