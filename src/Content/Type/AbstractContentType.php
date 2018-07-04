<?php

namespace Nemundo\Workflow\Content\Type;


use Nemundo\Com\Html\Form\AbstractSubmitForm;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Base\AbstractDataLoadObject;
use Nemundo\Core\Base\AbstractDataType;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Content\Item\AbstractContentItem;
use Nemundo\Workflow\Content\Item\DataContentItem;
use Nemundo\Workflow\Parameter\DataIdParameter;

abstract class AbstractContentType extends AbstractDataType   // AbstractTy AbstractDataLoadObject // AbstractBaseClass
{

    /**
     * @var string
     */
    //public $name;

    /**
     * @var string
     */
    //public $id;

    /**
     * @var string
     */
    protected $formClass;


    /**
     * @var string
     */
    protected $itemClass;

    /**
     * @var AbstractSite
     */
    public $itemSite;

    /**
     * @var string
     */
    public $parameterClass;


    //abstract protected function loadData();

    public function __construct()
    {

        $this->parameterClass = DataIdParameter::class;
        $this->itemClass = DataContentItem::class;

        parent::__construct();

        //$this->loadData();

    }



    public function getForm($parentItem = null)
    {


        $form = null;


        /** @var AbstractSubmitForm $item */
        $form = new $this->formClass($parentItem);

        return $form;


    }



    public function getItem($parentItem = null)
    {

        /** @var AbstractContentItem $item */
        $item = new $this->itemClass($parentItem);
        $item->contentType = $this;

        return $item;


    }







    public function getItemSite($dataId)
    {


        if ($this->itemSite == null) {
            return null;
        }

        $site = clone($this->itemSite);

        /** @var AbstractUrlParameter $parameter */
        $parameter = new $this->parameterClass($dataId);

        $site->addParameter($parameter);

        //$site->addParameter(new DataIdParameter($dataId));
        return $site;

    }




    /**
     * @var AbstractModel
     */
    public $modelClass;



    public function getModel()
    {

        if ($this->modelClass == null) {
            (new LogMessage())->writeError('No modelClass defined');
            return;
        }

        $model = (new ModelFactory())->getModelByClassName($this->modelClass);
        return $model;

    }




    public function onCreate($dataId)
    {

    }


}