<?php

namespace Nemundo\Workflow\App\Wiki\ContentType;


use Nemundo\Workflow\App\Wiki\ContentForm\HyperlinkContentForm;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\Wiki\ContentItem\HyperlinkContentView;
use Nemundo\Workflow\App\Wiki\Site\WikiRedirectSite;

class HyperlinkContentType extends AbstractContentType
{

    protected function loadData()
    {

        $this->contentName = 'Hyperlink';
        $this->contentId = '855391b8-6291-49ee-9e72-7f24277adf2e';
        $this->formClass = HyperlinkContentForm::class;
        $this->viewClass = HyperlinkContentView::class;
        $this->viewSite = WikiRedirectSite::$site;

    }

}