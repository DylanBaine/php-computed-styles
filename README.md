# PHP Computed Styles

Build up classes or styles to be injected into HTML.

## Installation

```bash
composer require baine/php-computed-styles
```

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
        'bg-success',
        'text-white'
    ])->whenNot($user->isAdmin(), [
        'bg-disabled'
    ]);

```

```html
<div class="<?= $classes ?>">My Div</div>
```

- The `flex` and `rounded` classes are statically added to the element.
- The `text-blue` class is added if `$user->isAdmin()` evaluates to true.
  - Key based values are only added if the value is of a boolean type (`true` or `false`).
- The `bg-success` and `text-white` classes are added to the element if the `$success` variable is truthy.
- The `bg-disabled` class is only added when `$user->isAdmin()` is falsy.

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
<div style="<?= $styles ?>">My Div</div>
```

This works pretty much exactly the same as how the `ComputedClasses` class works. The only difference is how the class is encoded to a string.
