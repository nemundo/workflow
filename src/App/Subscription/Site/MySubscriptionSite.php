<?php

namespace Nemundo\Workflow\App\Subscription\Site;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Factory\ContentTypeFactory;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\User\Type\UserSession;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Subscription\Data\Subscription\SubscriptionReader;
use Nemundo\Workflow\App\Subscription\Parameter\SubscriptionParameter;
use Nemundo\Workflow\App\Subscription\Site\Delete\MySubscriptionDeleteSite;

class MySubscriptionSite extends AbstractSite
{

    /**
     * @var MySubscriptionSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'My Subscription';
        $this->url = 'my-subscription';

        //$this->restricted=true;

        new MySubscriptionDeleteSite($this);

    }


    protected function registerSite()
    {
        MySubscriptionSite::$site= $this;
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;

        $layout = new BootstrapTwoColumnLayout($page);

        $table = new AdminClickableTable($layout->col1);

        $header = new AdminTableHeader($table);
        $header->addText('Content Type');
        $header->addText('Subject');
        //$header->addText('User');
        $header->addEmpty();


        $subscriptionReader = new SubscriptionReader();
        $subscriptionReader->model->loadContentType();
        $subscriptionReader->model->loadUser();
        $subscriptionReader->filter->andEqual($subscriptionReader->model->userId, (new UserSession())->userId);

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
            //$row->addText($subscriptionRow->user->displayName);
            $row->addClickableSite($contentType->getViewSite());

            // delete

            $site = clone(MySubscriptionDeleteSite::$site);
            $site->addParameter(new SubscriptionParameter($subscriptionRow->id));
            $row->addIconSite($site);


            //$site->addSite()

            //$row->addIconSite();



        }


        $page->render();


    }
}