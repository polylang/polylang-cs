# Polylang Coding Standards

[![Version](https://badgen.net/packagist/v/wpsyntex/polylang-cs)](https://packagist.org/packages/wpsyntex/polylang-cs)
[![License: MIT](https://badgen.net/github/license/polylang/polylang-cs)](https://github.com/polylang/polylang-cs/blob/main/LICENSE)

Polylang Coding Standards is a ruleset for code quality tools to be used in WP Syntex's projects.

## Installation

Standards are provided as a [Composer](https://getcomposer.org/) package and can be installed with:

```bash
composer require --dev wpsyntex/polylang-cs:dev-main
```

## PHP Code Sniffer

Set of [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) rules.

The following rulesets are included:

- Several custom sniffs mainly focused on naming conventions,
- [NeutronStandard](https://github.com/Automattic/phpcs-neutron-standard),
- [PHPCompatibilityWP](https://github.com/PHPCompatibility/PHPCompatibilityWP) (PHP 5.6 and WP 5.4),
- [Suin](https://github.com/suin/phpcs-psr4-sniff) (for PSR-4),
- [WordPress](https://github.com/WordPress/WordPress-Coding-Standards),
- [WordPressVIPMinimum](https://github.com/Automattic/VIP-Coding-Standards).

Example for your `phpcs.xml.dist` file:

```xml
<?xml version="1.0"?>
<ruleset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" name="Polylang Foobar" xsi:noNamespaceSchemaLocation="https://raw.githubusercontent.com/squizlabs/PHP_CodeSniffer/master/phpcs.xsd">
    <description>Coding standards for Polylang Foobar.</description>

    <arg value="p"/><!-- Shows progress. -->
    <arg name="colors"/><!-- Shows results with colors. -->
    <arg name="extensions" value="php"/><!-- Limits to PHP files. -->

    <file>.</file>

    <!-- Our own ruleset. -->
    <rule ref="Polylang">
        <exclude name="Squiz.PHP.CommentedOutCode.Found"/>
        <exclude name="WordPress.PHP.DiscouragedPHPFunctions.serialize_serialize"/>
    </rule>

    <!-- Run against the PSR-4 ruleset. -->
    <!-- https://github.com/suin/phpcs-psr4-sniff -->
    <arg name="basepath" value="."/>
</ruleset>
```
