<?php

namespace Aerni\AdvancedSeo\Blueprints\Sections;

use Aerni\AdvancedSeo\Contracts\BlueprintSection;

class SeoEntrySection implements BlueprintSection
{
    public function contents(): array
    {
        $fields = $this->fields();

        if (empty($fields)) {
            return [];
        }

        return [
            'display' => 'SEO',
            'fields' => $this->fields(),
        ];
    }

    public function fields(): array
    {
        $fields = collect();

        $fields->push($this->seoSection());

        return $fields->flatten(1)->toArray();
    }

    protected function seoSection(): array
    {
        return [
            [
                'handle' => 'section_seo_tags',
                'field' => [
                    'type' => 'section',
                    'instructions' => 'Configure the basic SEO Tags of this entry.',
                    'display' => 'SEO Tags',
                ],
            ],
            [
                'handle' => 'seo_title',
                'field' => [
                    'input_type' => 'text',
                    'type' => 'text',
                    'localizable' => true,
                    'listable' => 'hidden',
                    'display' => 'Meta Title',
                    'character_limit' => 60,
                    'instructions' => 'Set the Meta Title of this entry. Defaults to the entry\'s `Title`.',
                    'antlers' => false,
                    'validate' => [
                        'max:60',
                    ],
                ],
            ],
            [
                'handle' => 'seo_description',
                'field' => [
                    'type' => 'textarea',
                    'localizable' => true,
                    'listable' => 'hidden',
                    'display' => 'Meta Description',
                    'character_limit' => 160,
                    'instructions' => 'Set the Meta Description of this entry.',
                    'validate' => [
                        'max:160',
                    ],
                ],
            ],
            [
                'handle' => 'section_og',
                'field' => [
                    'type' => 'section',
                    'instructions' => 'Configure the Open Graph settings of this entry.',
                    'display' => 'Open Graph',
                ],
            ],
            [
                'handle' => 'og_title',
                'field' => [
                    'input_type' => 'text',
                    'type' => 'text',
                    'localizable' => true,
                    'listable' => 'hidden',
                    'display' => 'Open Graph Title',
                    'instructions' => 'Set the Open Graph Title of this entry. Defaults to the entry\'s `Meta Title` or `Title`.',
                    'character_limit' => 70,
                    'antlers' => false,
                    'validate' => [
                        'max:70',
                    ],
                ],
            ],
            [
                'handle' => 'og_description',
                'field' => [
                    'type' => 'textarea',
                    'localizable' => true,
                    'listable' => 'hidden',
                    'display' => 'Open Graph Description',
                    'character_limit' => '200',
                    'instructions' => 'Set the Open Graph Description of this entry. Defaults to the entry\'s `Meta Description`.',
                    'width' => 100,
                    'validate' => [
                        'max:200',
                    ],
                ],
            ],
            [
                'handle' => 'og_image',
                'field' => [
                    'type' => 'assets',
                    'mode' => 'list',
                    'max_files' => 1,
                    'allow_uploads' => true,
                    'container' => 'seo',
                    'restrict' => true,
                    'localizable' => true,
                    'listable' => 'hidden',
                    'display' => 'Open Graph Image',
                    'folder' => 'social_images',
                    'instructions' => 'Add an Open Graph Image for this entry. The recommended size is `1200x630px`.',
                    'validate' => [
                        'image',
                        'mimes:jpg,png',
                    ],
                ],
            ],
            [
                'handle' => 'section_twitter',
                'field' => [
                    'type' => 'section',
                    'instructions' => 'Configure the Twitter settings of this entry.',
                    'display' => 'Twitter',
                ],
            ],
            [
                'handle' => 'twitter_title',
                'field' => [
                    'input_type' => 'text',
                    'type' => 'text',
                    'localizable' => true,
                    'listable' => 'hidden',
                    'display' => 'Twitter Title',
                    'instructions' => 'Set the Twitter Title of this entry. Defaults to the entry\'s `Meta Title` or `Title`.',
                    'character_limit' => 70,
                    'antlers' => false,
                    'validate' => [
                        'max:70',
                    ],
                ],
            ],
            [
                'handle' => 'twitter_description',
                'field' => [
                    'type' => 'textarea',
                    'localizable' => true,
                    'listable' => 'hidden',
                    'display' => 'Twitter Description',
                    'character_limit' => '200',
                    'instructions' => 'Set the Twitter Description of this entry. Defaults to the entry\'s `Meta Description`.',
                    'width' => 100,
                    'validate' => [
                        'max:200',
                    ],
                ],
            ],
            [
                'handle' => 'twitter_image',
                'field' => [
                    'type' => 'assets',
                    'mode' => 'list',
                    'max_files' => 1,
                    'allow_uploads' => true,
                    'container' => 'seo',
                    'restrict' => true,
                    'localizable' => true,
                    'listable' => 'hidden',
                    'display' => 'Twitter Image',
                    'folder' => 'social_images',
                    'instructions' => 'Add a Twitter Image for this entry with an aspect ratio of `2:1` and minimum size of `300x157px`.',
                    'validate' => [
                        'image',
                        'mimes:jpg,png',
                        'dimensions:min_width=300,min_height=157',
                    ],
                ],
            ],
            [
                'handle' => 'section_canonical_url',
                'field' => [
                    'type' => 'section',
                    'instructions' => 'Configure the canonical URL settings for this entry.',
                    'display' => 'Canonical URL',
                ],
            ],
            [
                'handle' => 'seo_canonical_type',
                'field' => [
                    'options' => [
                        'entry' => 'Current Entry',
                        'current' => 'Current Domain',
                        'external' => 'External Domain',
                    ],
                    'display' => 'Canonical URL',
                    'type' => 'button_group',
                    'default' => 'entry',
                    'icon' => 'button_group',
                    'instructions' => 'Where should the canonical URL for this entry point to.',
                    'listable' => 'hidden',
                ],
            ],
            [
                'handle' => 'seo_canonical_current',
                'field' => [
                    'type' => 'entries',
                    'max_items' => 1,
                    'mode' => 'select',
                    'localizable' => true,
                    'listable' => 'hidden',
                    'display' => 'Canonical URL',
                    'instructions' => 'If this is an entry with duplicate content, link to the entry with the original content.',
                    'validate' => [
                        'required_if:seo_canonical_type,current',
                    ],
                    'if' => [
                        'seo_canonical_type' => 'equals current',
                    ],
                ],
            ],
            [
                'handle' => 'seo_canonical_external',
                'field' => [
                    'input_type' => 'url',
                    'display' => 'Canonical URL',
                    'type' => 'text',
                    'icon' => 'text',
                    'listable' => 'hidden',
                    'validate' => [
                        'required_if:seo_canonical_type,external',
                    ],
                    'if' => [
                        'seo_canonical_type' => 'equals external',
                    ],
                ],
            ],
            [
                'handle' => 'section_indexing',
                'field' => [
                    'type' => 'section',
                    'instructions' => 'Configure the indexing settings for this entry.',
                    'display' => 'Indexing',
                ],
            ],
            [
                'handle' => 'seo_noindex',
                'field' => [
                    'type' => 'toggle',
                    'instructions' => 'Prevent this entry from being indexed by search engines.',
                    'listable' => 'hidden',
                    'width' => 50,
                    'display' => 'Noindex',
                ],
            ],
            [
                'handle' => 'seo_nofollow',
                'field' => [
                    'type' => 'toggle',
                    'instructions' => 'Prevent site crawlers from following links in this entry.',
                    'listable' => 'hidden',
                    'width' => 50,
                    'display' => 'Nofollow',
                ],
            ],
            [
                'handle' => 'section_sitemap',
                'field' => [
                    'type' => 'section',
                    'instructions' => 'Configure the sitemap settings for this entry.',
                    'display' => 'Sitemap',
                ],
            ],
            [
                'handle' => 'sitemap_priority',
                'field' => [
                    'options' => [
                        '0.0' => '0.0',
                        '0.1' => '0.1',
                        '0.2' => '0.2',
                        '0.3' => '0.3',
                        '0.4' => '0.4',
                        '0.5' => '0.5',
                        '0.6' => '0.6',
                        '0.7' => '0.7',
                        '0.8' => '0.8',
                        '0.9' => '0.9',
                        '1.0' => '1.0',
                    ],
                    'clearable' => false,
                    'multiple' => false,
                    'searchable' => true,
                    'taggable' => false,
                    'push_tags' => false,
                    'cast_booleans' => false,
                    'type' => 'select',
                    'instructions' => 'Choose the priorty of this entry in the sitemap. `1.0` is the most important.',
                    'width' => 50,
                    'default' => '0.5',
                    'listable' => 'hidden',
                    'display' => 'Priority',
                ],
            ],
            [
                'handle' => 'sitemap_change_frequency',
                'field' => [
                    'options' => [
                        'always' => 'Always',
                        'hourly' => 'Hourly',
                        'daily' => 'Daily',
                        'weekly' => 'Weekly',
                        'monthly' => 'Monthly',
                        'yearly' => 'Yearly',
                        'never' => 'Never',
                    ],
                    'clearable' => false,
                    'multiple' => false,
                    'searchable' => true,
                    'taggable' => false,
                    'push_tags' => false,
                    'cast_booleans' => false,
                    'type' => 'select',
                    'instructions' => 'Choose the frequency in which search engines should crawl this entry.',
                    'width' => 50,
                    'default' => 'weekly',
                    'listable' => 'hidden',
                    'display' => 'Change Frequency',
                ],
            ],
            [
                'handle' => 'section_json_ld',
                'field' => [
                    'type' => 'section',
                    'display' => 'JSON-ld Schema',
                    'instructions' => 'Configure custom [JSON-LD](https://developers.google.com/search/docs/guides/intro-structured-data) for this entry.',
                ],
            ],
            [
                'handle' => 'json_ld',
                'field' => [
                    'theme' => 'material',
                    'mode' => 'javascript',
                    'indent_type' => 'tabs',
                    'indent_size' => 4,
                    'key_map' => 'default',
                    'line_numbers' => true,
                    'line_wrapping' => true,
                    'display' => 'JSON-LD Schema',
                    'instructions' => 'Add custom [JSON-LD](https://developers.google.com/search/docs/guides/intro-structured-data) for this entry. This will be wrapped in the appropriate script tag.',
                    'type' => 'code',
                    'icon' => 'code',
                    'listable' => 'hidden',
                ],
            ],
        ];
    }
}
