# SevDesk API Examples

This directory contains examples of how to use the SevDesk Laravel API package.

## Examples

### standalone.php
Shows how to use the package without Laravel:
- Simple initialization
- Configuration options
- Basic API operations
- Error handling

### laravel.php
Demonstrates Laravel integration:
- Dependency injection
- Controller usage
- Service class patterns
- Database synchronization

## Running the Examples

### Standalone Example
```bash
# Edit the file and add your API token
php examples/standalone.php
```

### Laravel Example
The Laravel example shows code patterns - integrate these into your Laravel application as needed.

## Configuration Options

When initializing the SevDesk connector, you can pass various configuration options:

```php
$config = [
    'api_token' => 'required',           // Your SevDesk API token
    'base_url' => 'optional',            // API base URL (default: https://my.sevdesk.de/api/v1)
    'user_agent' => 'optional',          // Custom User-Agent header
    'timeout' => 30,                     // Request timeout in seconds
    'retry' => [                         // Retry configuration
        'times' => 3,
        'sleep' => 1000,
    ],
];
```

## Error Handling

Always wrap API calls in try-catch blocks:

```php
try {
    $response = $sevdesk->contact()->getContacts();
    
    if ($response->successful()) {
        // Process data
    } else {
        // Handle API error
        $error = $response->json();
    }
} catch (\Saloon\Exceptions\Request\RequestException $e) {
    // Handle request exceptions
} catch (\Exception $e) {
    // Handle other exceptions
}
```