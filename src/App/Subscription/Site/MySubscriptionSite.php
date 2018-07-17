<?php

namespace Nemundo\Workflow\App\Subscription\Site;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Subscription\Data\Subscription\SubscriptionReader;

class MySubscriptionSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'MySubscription';
        $this->url = 'my-subscription';
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Content Type');
        $header->addText('Data Id');
        $header->addText('User');


        $reader = new SubscriptionReader();
        $reader->model->loadContentType();
        $reader->model->loadUser();

        foreach ($reader->getData() as $subscriptionRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($subscriptionRow->contentType->contentType);

            $row->addText($subscriptionRow->dataId);

            $contentType = $subscriptionRow->contentType->getContentTypeClassObject();

            $subject = $contentType->name;
            if ($subscriptionRow->dataId !== '0') {
                $subject = $contentType->getSubject($subscriptionRow->dataId);
            }
            $row->addText($subject);


            $row->addText($subscriptionRow->user->displayName);


        }


        $page->render();


    }
}