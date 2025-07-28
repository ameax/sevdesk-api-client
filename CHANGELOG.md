# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- Comprehensive README documentation with usage examples
- Configuration instructions for both standalone and Laravel usage
- Detailed API usage examples for contacts, invoices, parts, and bank accounts
- Error handling examples and best practices
- Troubleshooting guide for common issues
- Enum usage documentation

### Fixed
- Removed unnecessary `parent::__construct()` call for Saloon v3 compatibility
- Updated Response type hints from `Saloon\Contracts\Response` to `Saloon\Http\Response`

### Changed
- Improved constructor to accept both string API token and array configuration
- Enhanced documentation with real-world examples

## [1.0.0] - 2024-01-XX

### Added
- Initial release
- Full SevDesk API v1 support
- Saloon v3 integration
- Support for all major SevDesk resources:
  - Contacts (customers and suppliers)
  - Invoices and invoice positions
  - Orders and order positions
  - Credit notes
  - Vouchers (expenses)
  - Bank accounts and transactions
  - Products and services (parts)
  - Tags and categories
  - Reports and exports
- Laravel service provider for easy integration
- Comprehensive enum classes for type safety
- Support for both standalone and Laravel usage