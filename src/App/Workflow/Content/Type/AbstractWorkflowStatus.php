<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\App\Content\Type\Menu\MenuContentTypeTrait;
use Nemundo\App\Content\Type\Sequence\SequenceContentTypeTrait;
use Nemundo\Com\Html\Basic\Div;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Site\AbstractSite;


abstract class AbstractWorkflowStatus extends AbstractTreeContentType
{

    use UserAccessTrait;
    use SequenceContentTypeTrait;
    use MenuContentTypeTrait;
    use WorkflowStatusTrait;

    /**
     * @var bool
     */
   // public $changeStatus = true;

    /**
     * @var bool
     */
   // public $closingWorkflow = false;

    /**
     * @var bool
     */
  //  public $showStatus = true;


    /**
     * @var string
     */
    //  protected $processClass;

    /**
     * @var AbstractSite
     *
     */
    protected $statusChangeSite;



    public function getForm($parentItem = null)
    {

        $div = new Div($parentItem);
        $div->addCssClass('jumbotron');

        return parent::getForm($div);

    }


    // getStatusFormSite oder so was
    public function getStatusChangeSite()
    {

        $site = null;

        if ($this->statusChangeSite !== null) {
            $site = clone($this->statusChangeSite);
            $site->addParameter(new ContentTypeParameter($this->contentId));

        }

        return $site;

    }

}