<?php


namespace sahifedp\Profile\Views\Components\RelationStatus;

use \Illuminate\View\Component;
use sahifedp\Profile\Models\UserLegalInformation;
use sahifedp\Profile\Models\UserRelation;

class RelationStatus extends Component
{
    public $id;
    public $name;
    public $class;
    public $size;
    public $value;
    public $from;
    public $to;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id='religion',$name='religion',$class='form-control',$size='auto',$value=NULL,$from=NULL,$to=NULL)
    {
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->size = $size;
        $this->value = $value;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $items = UserRelation::STATUSES;
        return view('profile::Components.RelationStatus.selector',['items'=>$items]);
    }
}
