<?php

namespace Nemundo\Workflow\App\Wiki\Event;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Event\AbstractEvent;
use Nemundo\Workflow\App\Wiki\Content\Type\AbstractModelWikiTreeContentType;
use Nemundo\Workflow\App\Wiki\Data\Wiki\Wiki;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiCount;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageUpdate;


class WikiEvent extends AbstractEvent
{

    /**
     * @var string
     */
    public $pageId;

    /**
     * @var AbstractContentType|AbstractModelWikiTreeContentType
     */
    public $contentType;


    public function run($id)
    {

        $data = new Wiki();
        $data->pageId = $this->pageId;
        $data->contentTypeId = $this->contentType->contentId;
        $data->dataId = $id;
        $data->save();

        $count = new WikiCount();
        $count->filter->andEqual($count->model->pageId, $this->pageId);
        $count->filter->andEqual($count->model->delete, false);
        $itemCount = $count->getCount();

        $update = new WikiPageUpdate();
        $update->count = $itemCount;
        $update->updateById($this->pageId);

        if ($this->contentType->isObjectOfClass(AbstractModelWikiTreeContentType::class)) {
            $this->contentType->onWikiCreate($this->pageId, $id);
            $this->contentType->onCreate($id);
        }


    }

}