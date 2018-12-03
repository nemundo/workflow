<?php

namespace Nemundo\Workflow\App\Subscription\Site;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Factory\ContentTypeFactory;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\User\Type\UserSessionType;
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


        $subscriptionReader = new SubscriptionReader();
        $subscriptionReader->model->loadContentType();
        $subscriptionReader->model->loadUser();
        $subscriptionReader->filter->andEqual($subscriptionReader->model->userId, (new UserSessionType())->userId);

        foreach ($subscriptionReader->getData() as $subscriptionRow) {


            $row = new BootstrapClickableTableRow($table);
            $row->addText($subscriptionRow->contentType->contentType);
            //$row->addText($subscriptionRow->contentType->contentTypeClass);

            //$row->addText($subscriptionRow->dataId);

            $className = $subscriptionRow->contentType->contentTypeClass;

            /** @var AbstractContentType $contentType */
            $contentType = new $className($subscriptionRow->dataId);


            /*
            $contentType = $subscriptionRow->contentType->getContentTypeClassObject();

            $subject = $contentType->contentLabel;
            if ($subscriptionRow->dataId !== '0') {
                $subject = $contentType->getSubject($subscriptionRow->dataId);
            }*/
            $row->addText($contentType->getSubject());
            $row->addText($subscriptionRow->user->displayName);
            $row->addClickableSite($contentType->getViewSite());

            // delete

            //$site = clone(SubscriptionDeleteSite::$site);
            //$site->addSite()

            //$row->addIconSite();



        }


        $page->render();


    }
}