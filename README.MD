# BringBackMix

# ⚠️PACKAGE ABANDONED!⚠️
Instead of using it, please read the following tutorial for how to getting ready for using the new Laravel VITE:

[Laravel Vite Initial Settings](https://www.kaiopiola.dev/2022/08/laravel-vite.html)

<hr>

<a target="_blank" href="https://packagist.org/packages/kaiopiola/bringbackmix" ><img src="https://img.shields.io/packagist/dt/kaiopiola/bringbackmix?color=%2300FFF" /></a>
<a target="_blank" href="https://packagist.org/packages/kaiopiola/bringbackmix" ><img src="https://img.shields.io/packagist/v/kaiopiola/bringbackmix?color=%23888888&label=version" /></a>
<a target="_blank" href="https://packagist.org/packages/kaiopiola/bringbackmix" ><img src="https://img.shields.io/packagist/php-v/kaiopiola/bringbackmix" /></a> 


***This package is under development and may exhibit unexpected behavior while using it, please report any bugs or errors you find when using this solution, so that we can make it the best possible for your use!***


The BringBackMix package is a solution for those who don't want to use ```Vite``` on their projects with newer Laravel versions. So, I made a script for bringing the Webpack Mixer back and working on new projects!

## Advice

Avoid to use this solution on existing projects, this is not a Vite to Webpack converter and I can't assure it'll work as expected!
Use it only on new projects.

I recommend to start your favorite terminal as an administrator before running this. 

## Installation

Create a new Laravel project.
Them, run the following commands to install Composer and NPM dependencies:

```console 
composer install
```

```console 
npm install
```

So, install our package with the following command:

```console 
composer require kaiopiola/bringbackmix
```

## How to Use

Once everything is installed, you can run the following command and it will automatically set your project to the old Laravel Webpack standard:

```console
php vendor/kaiopiola/bringbackmix/run.php
```

## Considerations

This project is open to contributions, whether with suggestions or improvements to the code of any kind.
Feel free to participate in its development.

## License
MIT License (MIT). Please, read the [License File](LICENSE) for more informations.
