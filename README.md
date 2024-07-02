# PHP Advanced Substation Alpha (ASS) Subtitle Parser/Formatter

## Overview

`php-acc` is a PHP library designed for working with Advanced Substation Alpha (ASS) subtitle files. This library allows
you to build, modify, and manage ASS subtitle files programmatically.

## Features

- **Text Formatting**: Easily add and manage various text formatting options such as bold, italic, underline, and
  strikeout.
- **Styling**: Apply styles including font, font size, and text color.
- **Positioning and Animation**: Set precise text positions, animate text with movement, fading, and transitions.

## Installation

You can install the library via Composer. Add the following to your `composer.json`:

```json
{
  "require": {
    "idsulik/php-acc": "dev-main"
  }
}
```

Then run:

```bash
composer install
```

Alternatively, you can clone the repository and include the necessary files manually.

## Usage

### Building Subtitle Text

The `EventTextBuilder` class allows you to construct ASS subtitle text with various commands. Here’s an example:

```php
<?php

use PhpAss\Builder\EventTextBuilder;

$builder = new EventTextBuilder();
$builder
    ->addPlainText('Normal Text Before')
    ->addBoldText('Bold ')
    ->addItalicText('Italic ')
    ->addUnderlineText('Underline ')
    ->addStrikeoutText('Strikeout ')
    ->addFont('Arial')
    ->addFontSize(24)
    ->addPrimaryColor('FF0000')
    ->addSecondaryColor('00FF00')
    ->addOutlineColor('0000FF')
    ->addBackColor('FFFF00')
    ->addOutline(2)
    ->addShadow(3)
    ->addAlignment(5)
    ->addPosition(100.5, 200.75)
    ->addMove(0, 0, 100, 100, 1, 2)
    ->addFade(255, 128, 64, 0, 1000, 2000, 3000)
    ->addTransition(0, 1000, '1.0')
    ->resetStyle()
    ->addPlainText('Normal Text After');

echo $builder->build();
```

## Contributing

Contributions are welcome!

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.