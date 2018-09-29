<?php

namespace Nemundo\Workflow\App\Message\ContentItem;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Com\Html\Basic\Image;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\App\Message\Data\MessageImage\MessageImageReader;
use Nemundo\Workflow\App\Message\Data\MessageText\MessageTextReader;

class ImageContentView extends AbstractContentView
{

    public function getHtml()
    {


        $reader = new MessageImageReader();
        $row = $reader->getRowById($this->dataId);

        $img = new Image($this);
        $img->src = $row->image->getImageUrl($reader->model->imageAutoSize800);

        return parent::getHtml();
    }

}