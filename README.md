# Hugger (PSR-8)
[![Latest Stable Version](http://poser.pugx.org/navarr/hugger/v)](https://packagist.org/packages/navarr/hugger)
[![Total Downloads](http://poser.pugx.org/navarr/hugger/downloads)](https://packagist.org/packages/navarr/hugger)
[![Latest Unstable Version](http://poser.pugx.org/navarr/hugger/v/unstable)](https://packagist.org/packages/navarr/hugger)
[![License](http://poser.pugx.org/navarr/hugger/license)](https://packagist.org/packages/navarr/hugger)  
![Tests](https://github.com/navarr/hugger/actions/workflows/commit.yml/badge.svg)
![Code Coverage](https://codecov.io/gh/navarr/hugger/branch/main/graph/badge.svg?token=BHTKOZZDR3)

This is an implementation of PSR-8.  This package includes a Hugger class (which is always happy to hug), as well as a GroupHuggableTrait, so you can add hugging functionality to any class.

## Installation

Until such time as PSR-8 is un-abandoned, you need to install both my own implementation of its interfaces, as well as this hugging library.

    composer require navarr/psr-hug-interfaces:@dev navarr/hugger:@dev

## Usage

```php

class ClassThatWantsToHug
{
    use \Navarr\Hugger\GroupHuggableTrait;
}

$hugger = new ClassThatWantsToHug();
$otherHugger = new \Navarr\Hugger\Hugger();

$hugger->hug($otherHugger);
// Hugger will call $otherHugger->hug($other)

$hugger->groupHug([$otherHugger]);
```
