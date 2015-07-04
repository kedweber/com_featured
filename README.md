# com_featured

## Introduction

A simple component that displays mixed content from different components with the `featured` status.

See [the Moyo web site](http://moyoweb.nl/) for more details.

## Requirements

* Joomla 2.5 or 3.X .
* Koowa 0.9 or 1.0 (as yet, Koowa 2 is not supported)
* PHP 5.3.10 or better
* Composer
* Moyo Components


## Installation

### Composer

Installation is done through composer. In your `composer.json` file, you should add the following lines to the repositories
section:

From this repository,

```json
{
	"name": "moyo/featured",
	"type": "vcs",
	"url": "https://github.com/kedweber/com_featured.git"
}
```

or from the official [Moyo](http://www.moyoweb.nl) repository

```json
{
	"name": "moyo/featured",
	"type": "vcs",
	"url": "https://github.com/moyoweb/com_featured.git"
}
```

The require section should contain the following line:

```json
	"moyo/com_featured": "2.0.*",
```

Afterward, just run `composer update` from the root of your Joomla project.

### jsymlinker

	Another option, currently only available for Moyo developers, is by using the jsymlink script from the [Moyo Git
	Tools](https://github.com/derjoachim/moyo-git-tools).

## Usage

### Administrator backend

In the module manager, you can create a module that listens to `com_featured`.

### Modules

There is a module that displays an article as a Joomla! module. You can add it by choosing 'Articles' as module type.
Choose the article and you are set.

