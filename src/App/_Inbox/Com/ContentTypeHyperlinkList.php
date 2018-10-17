<?php

namespace Nemundo\Workflow\App\Inbox\Com;


use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\User\Information\UserInformation;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxReader;
use Nemundo\Workflow\App\Inbox\Site\InboxSite;

class ContentTypeHyperlinkList extends BootstrapHyperlinkList
{

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    public function getHtml()
    {

        $contentTypeId = (new ContentTypeParameter())->getValue();

        $inboxReader = new InboxReader();
        $inboxReader->model->loadContentType();
        $inboxReader->filter->andEqual($inboxReader->model->userId, (new UserInformation())->getUserId());
        $inboxReader->filter->andEqual($inboxReader->model->archive, false);


        $inboxReader->addGroup($inboxReader->model->contentTypeId);
        $inboxReader->addOrder($inboxReader->model->contentType->contentType);

        foreach ($inboxReader->getData() as $inboxRow) {


            if ($inboxRow->contentTypeId == $contentTypeId) {
                $this->addActiveHyperlink($inboxRow->contentType->contentType);
            } else {

                $site = clone($this->redirectSite);
                $site->title = $inboxRow->contentType->contentType;
                $site->addParameter(new ContentTypeParameter($inboxRow->contentTypeId));

                $this->addSite($site);

            }

        }

        return parent::getHtml();

    }

}