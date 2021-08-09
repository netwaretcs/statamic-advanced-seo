<?php

namespace Aerni\AdvancedSeo\Fieldsets;

use Aerni\AdvancedSeo\Facades\Fieldset;
use Aerni\AdvancedSeo\Fieldsets\BaseFieldset;
use Illuminate\Support\Collection;

class GeneralFieldset extends BaseFieldset
{
    protected string $display = 'General';

    protected function sections(): array
    {
        return [
            $this->general(),
        ];
    }

    protected function general(): Collection
    {
        return Fieldset::find('general');
    }
}
