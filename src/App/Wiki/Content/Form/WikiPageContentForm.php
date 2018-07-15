<?php

namespace Nemundo\Workflow\App\Wiki\Content\Form;


use Nemundo\Workflow\App\Wiki\Content\Type\WikiPageContentType;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageForm;

class WikiPageContentForm extends WikiPageForm
{

    /**
     * @var string
     */
    public $parentId;

    protected function onSubmit()
    {

        $dataId = parent::onSubmit();

        $contentType = new WikiPageContentType();
        $contentType->onCreate($dataId);

        return $dataId;


    }

}