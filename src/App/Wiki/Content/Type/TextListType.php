<?php

namespace Nemundo\Workflow\App\Wiki\Content\Type;


use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Workflow\App\Wiki\Content\Form\TextListTypeForm;
use Nemundo\Workflow\App\Wiki\Content\View\TextListView;
use Nemundo\Workflow\App\Wiki\Data\TextList\TextList;

class TextListType extends AbstractTreeContentType
{

    protected function loadType()
    {
        $this->contentLabel = 'Text List';
        $this->contentId = 'bbf160e0-039d-45d3-850f-b7e88a020c4f';
        $this->viewClass = TextListView::class;
        $this->formClass = TextListTypeForm::class;


    }


    public function saveType()
    {
        // TODO: Implement saveItem() method.
    }


    public function addText($text)
    {

        $this->createDataId();

        /*
        if ($this->dataId == null) {

            $this->dataId = (new RandomUniqueId())->getUniqueId();
            $this->saveContentLog();

        }*/

        $data = new TextList();
        $data->dataId = $this->dataId;
        $data->text = $text;
        $data->save();

    }


}