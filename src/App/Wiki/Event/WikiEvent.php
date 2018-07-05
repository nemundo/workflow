<?php

namespace Nemundo\Workflow\App\Wiki\Event;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Com\Html\Form\Event\AbstractAfterSubmitEvent;
use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\App\Inbox\Builder\InboxBuilder;
use Nemundo\Workflow\App\Wiki\Data\Wiki\Wiki;
use Schleuniger\Usergroup\SchleunigerUsergroup;

class WikiEvent extends AbstractAfterSubmitEvent
{


    /**
     * @var string
     */
    public $pageId;

    /**
     * @var AbstractContentType
     */
    public $contentType;


    public function run($id)
    {

        //(new Debug())->write('event');
        //exit;

        //$this->contentType->onCreate($id);

        $data = new Wiki();
        $data->pageId = $this->pageId;
        $data->contentTypeId = $this->contentType->id;
        $data->dataId = $id;
        $data->save();

        $builder = new InboxBuilder();
        $builder->contentType = $this->contentType;
        $builder->dataId = $id;
        $builder->subject = $this->contentType->getSubject($id);
        $builder->createUsergroupInbox(new SchleunigerUsergroup());

    }

}