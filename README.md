# Positive Affirmations MCP Server in PHP

This project is a minimal MCP server written in plain PHP. It exposes one tool, `get_positive_affirmation`, and protects every MCP request with a custom token auth header.

## What it does

- Accepts MCP JSON-RPC requests over HTTP `POST`
- Requires auth header, such as `X-Affirmations-MCP-Token: <token>`
- Supports `initialize`, `ping`, `tools/list`, and `tools/call`
- Returns a positive affirmation with these flavors:
  - `hippy`
  - `goth`
  - `emo`
  - `toxic_positivity`

## Project structure

- `public/index.php` - HTTP entry point
- `src/McpServer.php` - MCP protocol handling
- `src/AffirmationRepository.php` - affirmation data source

## Run it

Make sure PHP is installed locally, then start the built-in server:

```bash
AFFIRMATIONS_MCP_API_TOKEN=super-secret-token php -S 127.0.0.1:8084 -t public
```

To change the header name:

```bash
AFFIRMATIONS_MCP_API_TOKEN=super-secret-token \
AFFIRMATIONS_MCP_TOKEN_HEADER=X-Widget-Token \
php -S 127.0.0.1:8084 -t public
```

## Example request

Set `MCP_ENDPOINT` to your server's endpoint before running this request.

```bash
curl -X POST "$MCP_ENDPOINT" \
  -H "Content-Type: application/json" \
  -H "X-Affirmations-MCP-Token: super-secret-token" \
  -d '{
    "jsonrpc": "2.0",
    "id": 1,
    "method": "tools/call",
    "params": {
      "name": "get_positive_affirmation",
      "arguments": {
        "flavor": "goth"
      }
    }
  }'
```

## Notes

- `flavor` is optional. If omitted, the server chooses a random flavor.
- The token is read from `AFFIRMATIONS_MCP_API_TOKEN`.
- The header defaults to `X-Affirmations-MCP-Token`.
- You can override the header with `AFFIRMATIONS_MCP_TOKEN_HEADER`.
