<?php


namespace sahifedp\Profile\Views\Components;

use \Illuminate\View\Component;
use Psy\Util\Str;

class Login extends Component
{
    public $theme;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($theme=null)
    {
        die(22);
        $this->theme = "default";
        if($theme != null)
            $this->theme = $theme;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('profile::Components.Login.'.$this->theme);
    }
}
