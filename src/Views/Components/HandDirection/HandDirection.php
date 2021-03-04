<?php


namespace sahifedp\Profile\Views\Components\HandDirection;

use \Illuminate\View\Component;
use sahifedp\Profile\Models\UserSocialInformation;

class HandDirection extends Component
{
    public $id;
    public $name;
    public $class;
    public $size;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id='left-handed',$name='left_handed',$class='form-control',$size='auto',$value=NULL)
    {
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->size = $size;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $items = UserSocialInformation::USER_SOCIAL_HAND_DIRECTION;
        return view('profile::Components.HandDirection.selector',['items'=>$items]);
    }
}
