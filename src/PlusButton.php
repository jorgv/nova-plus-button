<?php

namespace Jorgv\PlusButton;

use Laravel\Nova\Fields\Field;

class PlusButton extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'plus-button';

    /**
     * Set the increase value.
     *
     * @param  int  $value
     * @return $this
     */
    public function increaseValue(int $value = 1)
    {
        return $this->withMeta(['increaseValue' => $value]);
    }

    /**
     * Set if decrease button should show.
     *
     * @param  bool  $bool
     * @return $this
     */
    public function decrease($bool = true)
    {
        return $this->withMeta(['decrease' => $decrease]);
    }    
}
