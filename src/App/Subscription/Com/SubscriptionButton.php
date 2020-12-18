<?php

namespace Nemundo\Workflow\App\Subscription\Com;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Html\Hyperlink\Hyperlink;
use Nemundo\Package\FontAwesome\FontAwesomeIcon;
use Nemundo\User\Type\UserSession;
use Nemundo\Workflow\App\Subscription\Data\Subscription\SubscriptionCount;
use Nemundo\Workflow\App\Subscription\Site\SubscriptionDeleteSite;
use Nemundo\Workflow\App\Subscription\Site\SubscriptionSite;


class SubscriptionButton extends AbstractHtmlContainer
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    /**
     * @var string
     */
    public $dataId = '0';

    /**
     * @var string
     */
    public $label = 'Subscribe';

    public function getContent()
    {

        $count = new SubscriptionCount();
        $count->filter->andEqual($count->model->contentTypeId, $this->contentType->contentId);
        $count->filter->andEqual($count->model->dataId, $this->dataId);
        $count->filter->andEqual($count->model->userId, (new UserSession())->userId);

        if ($count->getCount() == 0) {

            /*$icon = new FontAwesome($this);
            $icon->icon = 'star far';
            $icon->iconSize = 3;*/

            $button = new AdminSiteButton($this);
            $button->content = $this->label;  // 'Abonnieren';
            $button->site = SubscriptionSite::$site;
            $button->site->addParameter(new DataIdParameter($this->dataId));
            $button->site->addParameter(new ContentTypeParameter($this->contentType->contentId));

        } else {

            $link = new SiteHyperlink($this);
            $link->site = SubscriptionDeleteSite::$site;
            //$button->site->addParameter(new SubscriptionParameter())
            $link->site->addParameter(new DataIdParameter($this->dataId));
            $link->site->addParameter(new ContentTypeParameter($this->contentType->contentId));

            $icon = new FontAwesomeIcon($link);
            $icon->icon = 'star';
            $icon->iconSize = 3;

            $p = new Paragraph($this);
            $p->content = 'Du bist Abonnent';

            /*
            $button = new AdminButton($this);
            $button->content = 'Abo löschen';
            $button->site = SubscriptionDeleteSite::$site;
            //$button->site->addParameter(new SubscriptionParameter())
            $button->site->addParameter(new DataIdParameter($this->dataId));
            $button->site->addParameter(new ContentTypeParameter($this->contentType->id));*/

        }

        return parent::getContent();

    }

}