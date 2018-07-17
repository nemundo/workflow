<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Item;


use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\Design\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage\ContentTemplateImageReader;

class TemplateImageItem extends AbstractContentItem
{


    public function getHtml()
    {

        $reader = new ContentTemplateImageReader();
        $row = $reader->getRowById($this->dataId);

        $img = new BootstrapResponsiveImage($this);
        $img->src = $row->image->getImageUrl($reader->model->imageAutoSize800);



        return parent::getHtml();
    }

}