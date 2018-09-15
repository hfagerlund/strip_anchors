# strip_anchors

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-%238892bf.svg?style=flat-square)](https://php.net/) [![Minimum Symfony Version](https://img.shields.io/badge/symfony-%3E%3D%204.1-%2332a0d6.svg?style=flat-square)](https://github.com/symfony/symfony/) [![Minimum Twig Version](https://img.shields.io/badge/twig-%3E%3D%202.5-%238e9e21.svg?style=flat-square)](https://github.com/twigphp/Twig/)

The `strip_anchors` [Twig (v.2.5.0)](https://github.com/twigphp/Twig/) filter removes all anchor links (ie. links pointing to different sections of the same page where they are located) from input.

## Sample output:

```html
<!-- BEFORE applying filter: -->
<h2><a href="#features">Features of this Twig Extension</a></h2>

<!-- AFTER applying `strip_anchors` filter: -->
<h2>Features of this Twig Extension</h2>
```

**Please note:** This repository only shows directories and files from a [Symfony 4 skeleton project](https://github.com/hfagerlund/strip_anchors#how-to-use-in-symfony-4) that **need to be added or modified** to enable the 'strip_anchors' Twig extension.

## Usage
Use this Twig filter in an RSS feed template to help transform HTML input into valid RSS 2.0, as shown in the following examples:

### Example:
```
{{ item.content|strip_anchors }}
```

### Example 2: use in combination with another filter
```
<-- excerpt from rss.xml.twig: -->

<content:encoded>
   <![CDATA[
    {{ item.content|md2html|strip_anchors }}
   ]]>
</content:encoded>
```

### How To use in Symfony 4
This repository shows how this custom Twig extension (ie. the `strip_anchors` Twig filter) can be implemented in a Symfony 4 project structure created using [symfony/skeleton](https://symfony.com/doc/current/best_practices/creating-the-project.html).

#### Requirements
* [PHP](https://php.net/) (v.7.1.16)
* [Composer](https://getcomposer.org/) (v.1.6.5)
  * [symfony/skeleton](https://github.com/symfony/skeleton) (v.4.1.4.2)
  * [symfony/twig-bundle](https://github.com/symfony/twig-bundle) (v.4.1.4)
  * [symfony/web-server-bundle](https://github.com/symfony/web-server-bundle) (optional: for dev environment)
  * [phpunit/phpunit](https://packagist.org/packages/phpunit/phpunit) (v.7.3) OR [symfony/phpunit-bridge](https://github.com/symfony/phpunit-bridge), [symfony/test-pack](https://github.com/symfony/test-pack)

(Copyrights for the above remain with their respective owners.)

#### Installation
* Create a new project:
```
$ composer create-project symfony/skeleton my-project
```

* Clone this repository (as shown below) and make the corresponding modifications:

```
$ git clone https://github.com/hfagerlund/strip_anchors.git
```

## Run (dev) Server:

```
$ php bin/console server:run
```

## Run Tests:
From the project **root dir**, run one of the following:

### using phpunit/phpunit:
$ ./vendor/phpunit/phpunit/phpunit ./tests/

Or (recommended):
### using symfony/phpunit-bridge
$ ./bin/phpunit

## License
Copyright (c) 2018 Heini Fagerlund. Licensed under the [MIT License](https://github.com/hfagerlund/strip_anchors/blob/master/LICENSE).

