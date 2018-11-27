<?php

namespace Nemundo\Workflow\App\Wiki\Content;


use Nemundo\Workflow\App\Wiki\ContentType\MailContentType;
use Nemundo\Workflow\App\Wiki\Data\Mail\Mail;

class MailContent extends Mail
{


    public function save()
    {

        $dataId = parent::save();

        $type = new MailContentType();
        $type->onCreate($dataId);


    }

}