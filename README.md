# Directory

This laravel application serves employee directory information.

[![Build Status][1]][2]
[![Codecov][3]][4]

## Installation

Familiarize yourself with [the laravel application installation process][10].

Shibboleth SP must be [installed][12] to authenticate University users.

Clone this repository or download the zip archive.

    git clone https://github.com/uawcob/directory.git

Point the server document root at the `public` folder.
Set write permissions for the web server user to the storage and cache folders.

    sudo chown :www-data -R storage/ bootstrap/cache/
    sudo chmod g+w -R storage/ bootstrap/cache/

Create the environment variables file from the template.

    cp .env.example .env

Set all the values in `.env` accordingly.
Leave `APP_KEY` blank because it will be set by the deploy script later.

If you are running a Linux server connecting to MS SQL Server, then you might
be interested in the `php-sybase` package with [these configurations][15].

There are special web server configurations declared in [`.htaccess`][16]
which should be instead defined directly inside the virtual host.
Relying on the .htaccess file will slow down your site's performance.

Finally, there is a short [deploy script][14] to finish installation.

    ./deploy.bash

<p align="center">
    <a href="https://laravel.com/">
        <img src="https://laravel.com/assets/img/components/logo-laravel.svg" />
    </a>
</p>

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

[1]:https://travis-ci.org/uawcob/directory.svg?branch=master
[2]:https://travis-ci.org/uawcob/directory
[3]:https://img.shields.io/codecov/c/github/uawcob/directory/master.svg
[4]:https://codecov.io/gh/uawcob/directory/branch/master
[10]:https://laravel.com/docs/5.5#installation
[12]:https://github.com/razorbacks/ubuntu-authentication/tree/master/shibboleth
[14]:./deploy.bash
[15]:https://stackoverflow.com/a/32555727/4233593
[16]:./public/.htaccess
