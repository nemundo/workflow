<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\View;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Com\Html\Basic\Div;
use Nemundo\Com\Html\Hyperlink\Hyperlink;

class FileContentView extends AbstractContentView
{

    public function getHtml()
    {

        /*
        $row = (new TemplateFileReader())->getRowById($this->dataId);

        $div = new Div($this);
        $hyperlink = new Hyperlink($div);
        $hyperlink->content = $row->file->getFilename();
        $hyperlink->url = $row->file->getUrl();*/

        return parent::getHtml();
    }

}