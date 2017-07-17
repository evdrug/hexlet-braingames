# Brain games php package
[![Code Climate](https://codeclimate.com/github/jougene/project-lvl1-s136/badges/gpa.svg)](https://codeclimate.com/github/jougene/project-lvl1-s136)
[![Test Coverage](https://codeclimate.com/github/jougene/project-lvl1-s136/badges/coverage.svg)](https://codeclimate.com/github/jougene/project-lvl1-s136/coverage)
[![Issue Count](https://codeclimate.com/github/jougene/project-lvl1-s136/badges/issue_count.svg)](https://codeclimate.com/github/jougene/project-lvl1-s136)
[![Build Status](https://travis-ci.org/jougene/project-lvl1-s136.svg?branch=master)](https://travis-ci.org/jougene/project-lvl1-s136)
---

## Installation
`composer global require jougene/brain-games`

## Description
Some mini console brain games.
The specific game ask you for 3 questions.
Your challenge is to answer to all of them correctly.

## Games list
- brain-even - specify if the number is even or not.
- brain-calc - find the result of simple math expression
- brain-gcd - find the greatest common divisor of two given numbers
- brain-balance - balance the number (the difference of two digits in the given number should not equal more than one)
- brain-progression - find a missed number in the arithmetic progression
- brain-prime - specify if the number is prime or not

## Usage
Firstly you need add `~/.composer/vendor/bin` to your PATH

`$ bin/'game name'`
ex. `$ bin/brain-prime`

## Example
[![asciicast](https://asciinema.org/a/129073.png)](https://asciinema.org/a/129073)
