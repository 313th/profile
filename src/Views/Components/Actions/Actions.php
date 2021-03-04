<?php


namespace sahifedp\Profile\Views\Components\Actions;

use Illuminate\View\Component;
class Actions extends Component
{
    public $theme;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($theme=null)
    {
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
        return view('profile::Components.Actions.'.$this->theme);
    }
}
