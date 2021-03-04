<?php


namespace sahifedp\Profile\Views\Components\Health;

use \Illuminate\View\Component;
use sahifedp\Profile\Models\UserSocialInformation;

class Health extends Component
{
    public $id;
    public $name;
    public $class;
    public $size;
    public $value;
    public $descriptionId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id='health-status',$name='health_status',$class='form-control',$size='auto',$descriptionId='diseases',$value=NULL)
    {
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->size = $size;
        $this->value = $value;
        $this->descriptionId = $descriptionId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $items = UserSocialInformation::USER_SOCIAL_DISEASES;
        return view('profile::Components.Health.selector',['items'=>$items]);
    }
}
