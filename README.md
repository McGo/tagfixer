# Tagfixer

Still using mp3 as files? Ever had a mp3 library that has some files that have not been tagged correctly? This package 
might be helpful. 

Tagfixer is a package for Laravel >= 6.x that uses the https://acoustid.org/ music database with your mp3 files by 
analyzing each file and asking AcoustID for metadata. It will use fpcalc to generate a fingerprint and keep track of
the generated data if you wish.

## Stability 

The package is currently under development and not all able to be used. 

## Installation

1. Install the fpcalc utility from https://acoustid.org/chromaprint, on mac simply by calling ```brew install chromaprint```
2. Install the package into your laravel application
3. Create an account and applicatoin at AcoustID to get the apikey. 
4. Put your apikey in the .env variable TAGFIXER_APIKEY 

## Usage



