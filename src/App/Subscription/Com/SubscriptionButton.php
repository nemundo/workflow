<?php

namespace Nemundo\Workflow\App\Subscription\Com;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\Subscription\Data\Subscription\SubscriptionCount;
use Nemundo\Workflow\App\Subscription\Site\SubscriptionSite;
use Nemundo\Workflow\Parameter\DataIdParameter;


class SubscriptionButton extends AbstractHtmlContainerList
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

    public function getHtml()
    {

        $count = new SubscriptionCount();
        $count->filter->andEqual($count->model->contentTypeId, $this->contentType->id);
        $count->filter->andEqual($count->model->dataId, $this->dataId);
        $count->filter->andEqual($count->model->userId, (new UserInformation())->getUserId());

        if ($count->getCount() == 0) {
            $button = new AdminButton($this);
            $button->content = $this->label;  // 'Abonnieren';
            $button->site = SubscriptionSite::$site;
            $button->site->addParameter(new DataIdParameter($this->dataId));
            $button->site->addParameter(new ContentTypeParameter($this->contentType->id));

        } else {
            $p = new Paragraph($this);
            $p->content = 'Du bist Abonnent';
        }

        return parent::getHtml();

    }

}