# Jillian Russo's Website

[https://jillianelliottrusso.com](https://jillianelliottrusso.com)

Travis build: [![Build Status](https://travis-ci.org/understrap/understrap.svg?branch=master)](https://travis-ci.org/understrap/understrap)

## UnderStrap WordPress Theme

[UnderStrap site](https://understrap.com)  
[UnderStrap docs](https://understrap.github.io/)  
[UnderStrap child theme](https://github.com/understrap/understrap-child)

Understrap combines Underscores ([\_s](https://underscores.me/)), Bootstrap, Sass, [Font Awesome](http://fortawesome.github.io/Font-Awesome/) to be used as a starter theme or parent theme.

I've used Understrap as a starter, building my own custom theme on top of it.

All custom styles should be in `/sass/theme/_theme.scss` and `/sass/theme/_theme_variables.scss`, either using `@import` or not.

## Development Workflow

All database content is controlled on production (and duplicated on local as needed).

Work on the theme locally and update theme files on production manually via FTP.

To spin up a local server:  
`MAMP > Start Servers`

confirm node version:  
`nvm ls`  
`nvm use 8.9`

To install dependencies from the theme root, run:  
`npm install`

To compile Sass files without Browsersync, run:   
`gulp watch`

View site locally at:  
[http://localhost:8888/jillianelliottrusso/](http://localhost:8888/jillianelliottrusso/)

### Or, to run with [Browsersync](https://www.browsersync.io/):

Confirm Browsersync options reflect your environment in the file `/gulpconfig.json`:

Change this line:  
`"proxy": "localhost/",`

To this:  
`"proxy": "localhost:8888/jillianelliottrusso/",`

To compile Sass files with Browsersync, run:  
`gulp watch-bs`

View site locally at:  
[http://localhost:3000/jillianelliottrusso/](http://localhost:3000/jillianelliottrusso/)

### Customizing

Add custom JavasScript to: `/js/custom-javascript.js`

To compile scripts, run:  
`gulp scripts`

Note that `gulp watch-bs` includes `gulp scripts`.

### General

Posts are tagged with one of two categories: exhibitions or criticism. Both categories are listed in the nav as separate blog index pages. They both use `archive.php` and `loop-templates/content.php`.

The unused default combination blog index page uses `index.php` and `loop-templates/content.php`.

`archive-recommendations.php` (which controls `/recommendations`) is the default index page for the Recommendations custom post type.  
`recommendations-custom-index.php` (which controls `/recommendations-custom-index`) is a custom page with Recommendations index added.

## Deploying to the Live Site

Use SFTP to overwrite all changed files in the `understrap` theme directory via Cyberduck.