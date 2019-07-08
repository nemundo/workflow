<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Com;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Core\Type\File\File;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Fancybox\FancyboxHyperlink;

class WorkflowFancyboxHyperlink extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $filename;

    /**
     * @var string
     */
    public $url;




    public function getContent()
    {

        $extension = (new File($this->filename))->getFileExtension();
        if (($extension == 'png') || ($extension == 'jpg') || ($extension == 'jpeg')) {

            $hyperlink = new FancyboxHyperlink($this);
            $hyperlink->content = $this->filename;
            $hyperlink->imageUrl = $this->url;
            $hyperlink->caption =  $this->filename;

        } else {

            $hyperlink = new UrlHyperlink($this);
            $hyperlink->url =$this->url;
            $hyperlink->content =  $this->filename;

        }

        return parent::getContent();

    }

}