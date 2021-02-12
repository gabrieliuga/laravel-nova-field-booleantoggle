<?php

namespace Pnpd\BooleanToggle;

use Laravel\Nova\Fields\Field;

class BooleanToggle extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'BooleanToggle';
    protected $objectClass = '';
    protected $objectValue = '';

    public function setObjectClass(string $class): self
    {
        $this->objectClass = $class;
        $this->withMeta(['objectClass' => $class]);
        return $this;
    }

    public function setObjectValue(string $value): self
    {
        $this->objectValue = $value;
        $this->withMeta(['objectValue' => $value]);
        return $this;
    }

}
