# PHP Computed Styles

Build up classes or styles to be injected into HTML.

## Example Usage

The two main classes in this package can be used to build styles and classes for your HTML dynamically.

### ComputedClasses

```php
<?php

use Baine\PhpComputedStyles\ComputedClasses;

...


$classes = ComputedClasses::make([
    'flex',
    'rounded',
    'text-blue' => $user->likesBlue()
])
    ->when($success, [
        'bg-success'
    ])->whenNot($user->isAdmin(), [
        'bg-disabled'
    ]);

```

```html
<div class="<?= $classes ?>">My Div</div>
```

### ComputedStyles

```php
<?php

use Baine\PhpComputedStyles\ComputedStyles;

...

$styles = ComputedStyles::make([
    'display' => 'flex',
    'justify-content' => 'center'
])
    ->when($success, [
        'justify-content' => 'start'
    ])->whenNot($user->isAdmin(), [
        'color' => 'grey'
    ]);

```

```html
<div styles="<?= $styles ?>">My Div</div>
```
