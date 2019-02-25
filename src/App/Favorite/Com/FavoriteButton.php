<?php

namespace Nemundo\Workflow\App\Favorite\Com;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Basic\Paragraph;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Workflow\App\Favorite\Data\Favorite\FavoriteCount;
use Nemundo\Workflow\App\Favorite\Site\FavoriteDeleteSite;
use Nemundo\Workflow\App\Favorite\Site\FavoriteSite;


class FavoriteButton extends AbstractHtmlContainer
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
        $count->filter->andEqual($count->model->contentTypeId, $this->contentType->contentId);
        $count->filter->andEqual($count->model->dataId, $this->dataId);
        $count->filter->andEqual($count->model->userId, (new UserSessionType())->userId);

        if ($count->getCount() == 0) {
            $button = new AdminButton($this);
            $button->content = $this->label;
            $button->site = FavoriteSite::$site;
            $button->site->addParameter(new DataIdParameter($this->dataId));
            $button->site->addParameter(new ContentTypeParameter($this->contentType->contentId));

        } else {
            $p = new Paragraph($this);
            $p->content = 'Dein Favorit';

            $button = new AdminButton($this);
            $button->content = 'Favorit löschen';
            $button->site = FavoriteDeleteSite::$site;
            //$button->site->addParameter(new SubscriptionParameter())
            $button->site->addParameter(new DataIdParameter($this->dataId));
            $button->site->addParameter(new ContentTypeParameter($this->contentType->contentId));

        }

        return parent::getHtml();

    }

}