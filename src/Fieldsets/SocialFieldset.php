<?php

namespace Aerni\AdvancedSeo\Fieldsets;

use Aerni\AdvancedSeo\Facades\Fieldset;
use Aerni\AdvancedSeo\Fieldsets\BaseFieldset;
use Illuminate\Support\Collection;

class SocialFieldset extends BaseFieldset
{
    protected string $display = 'Social';

    protected function sections(): array
    {
        return [
            $this->generator(),
            $this->openGraph(),
            $this->twitter(),
        ];
    }

    protected function generator(): ?Collection
    {
        return config('advanced-seo.social_images.generator', true)
            ? Fieldset::find('social/generator')
            : null;
    }

    protected function openGraph(): ?Collection
    {
        return config('advanced-seo.social_images.open_graph', true)
            ? Fieldset::find('social/open_graph')
            : null;
    }

    protected function twitter(): ?Collection
    {
        return config('advanced-seo.social_images.twitter', true)
            ? Fieldset::find('social/twitter')
            : null;
    }
}
