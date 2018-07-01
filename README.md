# php-cs-fixer-config

This repository contains the common code style configuration for all [**@amphp**](https://github.com/amphp) projects.
It's based on the ideas of [`refinery29/php-cs-fixer-config`](https://github.com/refinery29/php-cs-fixer-config/).

[![Build Status](https://travis-ci.org/amp/php-cs-fixer-config.svg?branch=master)](https://travis-ci.org/amp/php-cs-fixer-config)

## Installation

```
composer require --dev amphp/php-cs-fixer-config
```

## Usage

### Configuration

Create a configuration file `.php_cs.dist` in the root of the project:

```php
<?php

$config = new Amp\CodeStyle\Config;
$config->getFinder()
    ->in(__DIR__ . "/examples")
    ->in(__DIR__ . "/src")
    ->in(__DIR__ . "/test");

$cacheDir = getenv('TRAVIS') ? getenv('HOME') . '/.php-cs-fixer' : __DIR__;
$config->setCacheFile($cacheDir . '/.php_cs.cache');

return $config;
```

### Git

Add `.php_cs.cache` (the cache file used by `php-cs-fixer`) to `.gitignore`:

```
vendor/
.php_cs.cache
```

### Travis

Update your `.travis.yml` to cache the `php_cs.cache` file:

```yml
cache:
  directories:
    - $HOME/.php-cs-fixer
```

Then run `php-cs-fixer` in the `script` section:

```yml
script:
  - vendor/bin/php-cs-fixer fix --config=.php_cs.dist --verbose --diff --dry-run
```

## Fixing issues

### Manually

If you need to fix issues locally, run

```
./vendor/bin/php-cs-fixer fix -v
```

### Pre-commit hook

You can add a `pre-commit` hook to format the code automatically before each commit.

Run `touch .git/pre-commit` to create a new hook, make it executable with `chmod +x .git/pre-commit` and paste the following script into `.git/pre-commit`:

```bash
#!/usr/bin/env bash

echo "Running php-cs-fixer to format the code..."

CURRENT_DIRECTORY=`pwd`
GIT_HOOKS_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

PROJECT_DIRECTORY="$GIT_HOOKS_DIR/../.."

cd $PROJECT_DIRECTORY;
PHP_CS_FIXER="vendor/bin/php-cs-fixer"

HAS_PHP_CS_FIXER=false

if [ -x "$PHP_CS_FIXER" ]; then
    HAS_PHP_CS_FIXER=true
fi

if $HAS_PHP_CS_FIXER; then
    git status --porcelain | grep -e '^[AM]\(.*\).php$' | cut -c 3- | while read line; do
        ${PHP_CS_FIXER} fix --config-file=.php_cs --verbose ${line};
        git add "$line";
    done
else
    echo ""
    echo "Please install php-cs-fixer, e.g.:"
    echo ""
    echo "  composer require friendsofphp/php-cs-fixer:2.0.0"
    echo ""
fi

cd $CURRENT_DIRECTORY;
echo "Done."
```

## License

This package is licensed using the MIT License.
