# OYM Emoji text Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres to [Semantic Versioning](http://semver.org/).

## 3.1.4 - 2024-10-01
### Fixed
- Fixed migration that could fail with incorrect character encoding

## 3.1.3 - 2024-10-01
### Fixed
- Fixed migration that could occur when a table contained corrupted JSON data

## 3.1.2 - 2024-08-19
### Fixed
- Fixed migration to update Emoji Text fields to Plain text fields. Also take care of the DB prefix.

## 3.1.1 - 2024-08-18
### Fixed
- Fixed migration to update Emoji Text fields to Plain text fields. Also take care of the DB prefix.

## 3.1.0 - 2024-03-18
### Added
- Added migration to update Emoji Text fields to Plain text fields. Also update the elements_sites.content column values.

## 3.0.0 - 2024-03-15
### Updated
- Updated PHP version to 8.2 or higher
- Updated craftcms/cms version to 5.0.0-beta.1 or higher
- Updated phpcs.xml

### Removed
- Removed deprecated.php

## 2.1.6 - 2024-03-06
### Fixed
- Improve error check for base64_decode

## 2.1.5 - 2024-03-06
### Fixed
- Fix type hinting for `serializeValue` method

## 2.1.4 - 2024-03-06
### Fixed
- Fix type hinting for `normalizeValue` method

## 2.1.3 - 2024-03-04
### Fixed
- Fixed indenting composer.json

## 2.1.2 - 2024-03-04
### Fixed
- Fixed indenting composer.json

## 2.1.1 - 2024-03-04
### Fixed
- Fixed missing \ in namespace

## 2.1.0 - 2024-03-01
### Added
- Added phpcs
- Added deprecated tde namespace

### Changed
- Changed TDE > OYM

## 2.0.0 - 2023-01-02
### Changed
- Added support for Craft 4

## 1.0.1 - 2020-06-09
### Fixed
- Fix "validateCharLimit" error when saving the emoji text field

## 1.0.0 - 2018-06-13
### Added
- Initial release
