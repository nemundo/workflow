<?php

namespace Nemundo\Workflow\App\Notification\Reader;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Web\Site\AbstractSite;

class NotificationItem extends AbstractBase
{

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $message;

    /**
     * @var string
     */
    public $source;

    /**
     * @var DateTime
     */
    public $dateTime;

    /**
     * @var string
     */
    public $dateTimeText;


    /**
     * @var AbstractSite
     */
    public $site;


    public function isReaded()
    {

    }


}