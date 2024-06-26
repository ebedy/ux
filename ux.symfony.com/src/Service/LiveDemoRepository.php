<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use App\Model\LiveDemo;

class LiveDemoRepository
{
    /**
     * @return array<LiveDemo>
     */
    public function findAll(): array
    {
        return [
            new LiveDemo(
                'infinite-scroll-2',
                name: 'Infinite Scroll - 2/2',
                description: 'Loading on-scroll, flexible layout grid, colorfull loading animations and... more T-Shirts!',
                route: 'app_demo_live_component_infinite_scroll_2',
                longDescription: <<<EOF
The second and final part of the <strong>Infinite Scroll Serie</strong>, with a new range of (lovely) T-Shirts!
<br>
Now with <code>automatic loading on scroll</code>, a new trick and amazing <code>loading animations</code>!
EOF,
                tags: ['grid', 'pagination', 'loading', 'scroll'],
            ),
            new LiveDemo(
                'infinite-scroll',
                name: 'Infinite Scroll - 1/2',
                description: 'Load more items as you scroll down the page.',
                route: 'app_demo_live_component_infinite_scroll',
                longDescription: <<<EOF
Infinite scroll allows users to continuously load content as they scroll down the page.
<br><code>Part One</code> of this demo shows how to <code>append new items</code> to the page with a <a href="/live-component"><code>LiveComponent</code></a>.
EOF,
                tags: ['grid', 'pagination', 'navigation'],
            ),
            new LiveDemo(
                'live-memory',
                name: 'Live Memory Card Game',
                description: 'A Memorable Game UX with Live Components!',
                route: 'app_demo_live_memory',
                longDescription: <<<EOF
A Memorable Game UX with Live Components! Discover how to use Live Components to create a game with a vibrant interface,
 rich interactions and real-time updates. This journey will take you through many features of Live Components, and you'll
  learn how to use them to create a fun and engaging game.
EOF,
                tags: ['game', 'time', 'events', 'LiveAction'],
            ),
            new LiveDemo(
                'auto-validating-form',
                name: 'Auto-Validating Form',
                description: 'Create a form that validates each field in-real-time as the user enters data!',
                route: 'app_demo_live_component_auto_validating_form',
                longDescription: <<<EOF
Enter a bad email or leave the password empty, and see how the
form validates in real time!
<br>
This renders a normal Symfony form but with extras added on top,
all generated from Symfony & Twig.
EOF,
                tags: ['form', 'validation', 'inline'],
            ),
            new LiveDemo(
                'form-collection-type',
                name: 'Embedded CollectionType Form',
                description: 'Create embedded forms with functional "add" and "remove" buttons all in Twig.',
                route: 'app_demo_live_component_form_collection_type',
                longDescription: <<<EOF
Unlock the potential of Symfony's <a href="https://symfony.com/doc/current/reference/forms/types/collection.html"><code>CollectionType</code></a> while
writing zero JavaScript.
<br>
This demo shows off adding and removing items entirely in PHP & Twig.
EOF,
                tags: ['form', 'collection'],
            ),
            new LiveDemo(
                'dependent-form-fields',
                name: 'Dependent Form Fields',
                description: 'After selecting the first field, automatically reload the options for a second field.',
                route: 'app_demo_live_component_dependent_form_fields',
                longDescription: <<<EOF
Unleash the power of form events, thanks to <a href="/live-component"><code>LiveComponent</code></a>
and <a href="https://github.com/SymfonyCasts/dynamic-forms"><code>DynamicForms</code></a>.
EOF,
                tags: ['form', 'field', 'events'],
            ),
            new LiveDemo(
                'voting',
                name: 'Up & Down Voting',
                description: 'Save up & down votes live in pure Twig & PHP.',
                route: 'app_demo_live_component_voting',
                longDescription: <<<EOF
With each row as its own component, it's easy to add up & down voting + keep track of which items have been voted on.
<br>
This uses a <a href="https://symfony.com/bundles/ux-live-component/current/index.html#actions">LiveAction</a> to save everything with Ajax.
EOF,
                tags: ['form', 'LiveAction'],
            ),
            new LiveDemo(
                'inline-edit',
                name: 'Inline Editing',
                description: 'Activate an inline editing form with real-time validation.',
                route: 'app_demo_live_component_inline_edit',
                longDescription: <<<EOF
Inline editing? Simple. Use LiveComponents to track if you're in "edit" mode, let
the user update any fields on your entity, and save through a <code>LiveAction</code>.
EOF,
                tags: ['form', 'inline', 'LiveAction'],
            ),
            new LiveDemo(
                'chartjs',
                name: 'Auto-Updating Chart',
                description: 'Render & Update a Chart.js chart in real-time.',
                route: 'app_demo_live_component_chartjs',
                longDescription: <<<EOF
What do you get with Live Components + UX Chart.js + UX Autocomplete?
<br>
An auto-updating chart that you will ❤️.
EOF,
                tags: ['chart', 'data', 'LiveAction', 'stimulus'],
            ),
            new LiveDemo(
                'invoice',
                name: 'Invoice Creator',
                description: 'Create an invoice + line items that updates as you type.',
                route: 'app_demo_live_component_invoice',
                longDescription: <<<EOF
Create or edit an `Invoice` entity along with child components for each related `InvoiceItem` entity.
<br>
Children components emit events to communicate to the parent and everything is saved in a `saveInvoice` LiveAction method.
EOF,
                tags: ['form', 'entity', 'events', 'LiveAction'],
            ),
            new LiveDemo(
                'product-form',
                name: 'Product Form + Category Modal',
                description: 'Create a Category on the fly - from inside a product form - via a modal.',
                route: 'app_demo_live_component_product_form',
                longDescription: <<<EOF
Open a child modal component to create a new Category.
EOF,
                tags: ['form', 'entity', 'events', 'modal'],
            ),
            new LiveDemo(
                'upload',
                name: 'Uploading files',
                description: 'Upload file from your live component through a LiveAction.',
                route: 'app_demo_live_component_upload',
                longDescription: <<<EOF
File uploads are tricky. Submit them to a `#[LiveAction]` with the `files` modifier on `data-live-action` then process them.
EOF,
                tags: ['form', 'file', 'upload', 'LiveAction'],
            ),
        ];
    }

    public function getNext(string $identifier, bool $loop = false): ?LiveDemo
    {
        $demos = $this->findAll();
        while ($demo = current($demos)) {
            if ($demo->getIdentifier() === $identifier) {
                return prev($demos) ?: ($loop ? end($demos) : null);
            }
            next($demos);
        }

        return null;
    }

    public function getPrevious(string $identifier, bool $loop = false): ?LiveDemo
    {
        $demos = $this->findAll();
        while ($demo = current($demos)) {
            if ($demo->getIdentifier() === $identifier) {
                return next($demos) ?: ($loop ? reset($demos) : null);
            }
            next($demos);
        }

        return null;
    }

    public function getMostRecent(): LiveDemo
    {
        $demos = $this->findAll();

        return current($demos);
    }

    public function find(string $identifier): LiveDemo
    {
        $demos = $this->findAll();
        foreach ($demos as $demo) {
            if ($demo->getIdentifier() === $identifier) {
                return $demo;
            }
        }

        throw new \InvalidArgumentException(\sprintf('Unknown demo "%s"', $identifier));
    }
}
