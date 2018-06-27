<?php

namespace Nemundo\Workflow\Reader\Notification;


use Nemundo\Com\Html\Basic\Bold;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\Data\UserNotification\UserNotificationRow;
use Nemundo\Workflow\Parameter\NotificationParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\Notification\NotificationDeleteSite;
use Nemundo\Workflow\Site\Notification\NotificationRedirectSite;

class NotificationItem extends AbstractBase
{

    /**
     * @var UserNotificationRow
     */
    private $userNotificationRow;

    public function __construct(UserNotificationRow $userNotificationRow)
    {
        $this->userNotificationRow = $userNotificationRow;
    }


    /**
     * @var string
     */
    public $workflowNumber;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $message;


    public $redirectSite;


    public function getTitle()
    {

        $number = $this->workflowNumber;

        if ($number !== '') {
            $number .= ': ';
        }


        $title = $number . $this->subject;

        if ($this->userNotificationRow->read == 0) {

            $bold = new Bold();
            $bold->content = $title;

            $title = $bold->getHtmlString();

        }


        return $title;

    }


    public function getItemSite()
    {

        //$process = $this->userNotificationRow->statusChange->workflow->process->getProcessClassObject();

        //if ($process !== null) {
        //$site = $process->getItemSite();
        //$site->addParameter(new WorkflowParameter($this->userNotificationRow->statusChange->workflowId));


        $site = clone(NotificationRedirectSite::$site);
        $site->addParameter(new NotificationParameter($this->userNotificationRow->id));

        return $site;

    }


    public function getDeleteSite()
    {

        $site = clone(NotificationDeleteSite::$site);
        $site->addParameter(new NotificationParameter($this->userNotificationRow->id));
        return $site;

    }


}