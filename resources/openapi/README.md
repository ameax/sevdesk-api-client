# OpenAPI Specifications

This directory contains versioned OpenAPI specifications used to generate the SDK.

## Files

- `sevdesk-openapi-YYYY-MM-DD.yaml` - OpenAPI specification downloaded on the specified date

## Updating the SDK

When SevDesk updates their API, you can:

1. Download the latest OpenAPI specification:
   ```bash
   curl -o resources/openapi/sevdesk-openapi-$(date +%Y-%m-%d).yaml https://api.sevdesk.de/openapi.yaml
   ```

2. Compare with the previous version to see what changed

3. Regenerate the SDK:
   ```bash
   ./vendor/bin/sdkgenerator generate:sdk resources/openapi/sevdesk-openapi-$(date +%Y-%m-%d).yaml \
     --type=openapi \
     --name="SevDesk" \
     --namespace="Ameax\\SevDeskApi" \
     --output="./src" \
     --force
   ```

## Version History

- `sevdesk-openapi-2025-07-28.yaml` - Initial version used to generate the SDK