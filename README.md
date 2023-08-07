![tests](https://github.com/jeyroik/df-templates/workflows/PHP%20Composer/badge.svg?branch=master&event=push)
![codecov.io](https://codecov.io/gh/jeyroik/df-templates/coverage.svg?branch=master)

[![Latest Stable Version](https://poser.pugx.org/jeyroik/df-templates/v)](//packagist.org/packages/jeyroik/df-templates)
[![Total Downloads](https://poser.pugx.org/jeyroik/df-templates/downloads)](//packagist.org/packages/jeyroik/df-templates)
[![Dependents](https://poser.pugx.org/jeyroik/df-templates/dependents)](//packagist.org/packages/jeyroik/df-templates)


# df-templates

Templates for DF

Provide interfaces and helper classes for templating anything for applications and it's parameters.

# usage

Templating consists of two stages:
- Preparing data for template.
- Making template.

The library provides several tools to help you with these tasks:
- `IWithTemplate` entity.
  - Supports application name for filtering templates.
  - Supports params names for filtering.
- `with_templates` storage.
- `ITemplateService` for getting templates.
- `IContext` helps clarify the current context and desired results.
- Stages for making templates based on the context.

So to get started with templating using `df-templates`, you will need:
- `IWithTemplate` entity.
- A dispatcher for preparing data for the template.
- A plugin for making the template.

For more detailed usage instructions, please see the tests provided with the library.
