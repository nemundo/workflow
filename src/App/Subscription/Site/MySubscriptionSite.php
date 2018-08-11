<?php

namespace Nemundo\Workflow\App\Subscription\Site;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Subscription\Data\Subscription\SubscriptionReader;

class MySubscriptionSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'My Subscription';
        $this->url = 'my-subscription';
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;


        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Content Type');
        $header->addText('Subject');
        $header->addText('User');


        $reader = new SubscriptionReader();
        $reader->model->loadContentType();
        $reader->model->loadUser();

        foreach ($reader->getData() as $subscriptionRow) {



            $row = new BootstrapClickableTableRow($table);
            $row->addText($subscriptionRow->contentType->contentType);
            //$row->addText($subscriptionRow->contentType->contentTypeClass);

            //$row->addText($subscriptionRow->dataId);

            $contentType = $subscriptionRow->contentType->getContentTypeClassObject();

            $subject = $contentType->name;
            if ($subscriptionRow->dataId !== '0') {
                $subject = $contentType->getSubject($subscriptionRow->dataId);
            }
            $row->addText($subject);


            $row->addText($subscriptionRow->user->displayName);

            $row->addClickableSite($contentType->getItemSite($subscriptionRow->dataId));


        }


        $page->render();


    }
}