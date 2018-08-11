<?php

namespace Nemundo\Workflow\App\Favorite\Com;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\Favorite\Data\Favorite\FavoriteCount;
use Nemundo\Workflow\App\Favorite\Site\FavoriteDeleteSite;
use Nemundo\Workflow\App\Favorite\Site\FavoriteSite;
use Nemundo\Workflow\App\Subscription\Data\Subscription\SubscriptionCount;
use Nemundo\Workflow\App\Subscription\Parameter\SubscriptionParameter;
use Nemundo\Workflow\App\Subscription\Site\SubscriptionDeleteSite;
use Nemundo\Workflow\App\Subscription\Site\SubscriptionSite;
use Nemundo\App\Content\Parameter\DataIdParameter;


class FavoriteButton extends AbstractHtmlContainerList
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
    public $label = 'Favorite (Icon)/Bookmark';

    public function getHtml()
    {

        $count = new FavoriteCount();
        $count->filter->andEqual($count->model->contentTypeId, $this->contentType->id);
        $count->filter->andEqual($count->model->dataId, $this->dataId);
        $count->filter->andEqual($count->model->userId, (new UserInformation())->getUserId());

        if ($count->getCount() == 0) {
            $button = new AdminButton($this);
            $button->content = $this->label;
            $button->site = FavoriteSite::$site;
            $button->site->addParameter(new DataIdParameter($this->dataId));
            $button->site->addParameter(new ContentTypeParameter($this->contentType->id));

        } else {
            $p = new Paragraph($this);
            $p->content = 'Dein Favorit';

            $button = new AdminButton($this);
            $button->content = 'Favorit löschen';
            $button->site = FavoriteDeleteSite::$site;
            //$button->site->addParameter(new SubscriptionParameter())
            $button->site->addParameter(new DataIdParameter($this->dataId));
            $button->site->addParameter(new ContentTypeParameter($this->contentType->id));

        }

        return parent::getHtml();

    }

}