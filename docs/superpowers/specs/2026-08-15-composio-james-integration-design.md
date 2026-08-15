# James / Everpost Composio Integration Design

## Goal

Enable James inside Everpost to use Composio for authenticated third-party app integrations, beginning with GitHub, and prove the integration with one safe, read-only real tool call.

## Existing Context

Everpost is a Laravel 13 / PHP application. It already includes Laravel AI and Laravel MCP. The Composio agent skill is installed under `.agents/skills/composio/`. The Composio Platform API key is stored outside source control in the Cloudflare runtime environment as `COMPOSIO_API_KEY`.

## Architecture

Keep the existing Laravel/PHP architecture. Do not introduce a parallel Node service or replace the current agent runtime.

Add one focused server-side Composio integration layer responsible for:

- reading `COMPOSIO_API_KEY` from the existing runtime environment;
- mapping each authenticated Everpost user to a stable Composio user identity;
- creating or resuming a Composio session for that user;
- exposing connection state and Connect Links when an integration requires authorization;
- discovering and invoking Composio tools through the current Platform session API;
- returning structured results and Composio log/request identifiers for debugging.

James and other application services should call this integration layer instead of embedding Composio HTTP details throughout the codebase.

## First Integration

Use GitHub as the initial integration.

The first proof must be a real, read-only provider call made through James/Everpost for the current application user after GitHub authorization. Prefer an identity or repository-read operation such as fetching the authenticated GitHub user or listing accessible repositories. The exact Composio tool slug must be discovered at runtime rather than hard-coded from memory.

## Authentication Flow

Use Composio-managed authentication. Do not build a separate GitHub OAuth flow.

1. Everpost identifies the signed-in application user with its existing stable user ID.
2. The Composio integration creates or resumes a user-scoped session using that identity.
3. When GitHub is not connected, the server requests a Composio Connect Link and returns it to the UI/agent flow.
4. The user completes provider authorization through Composio.
5. Everpost resumes the same user-scoped session.
6. James discovers the appropriate GitHub read-only tool and executes it.
7. The response is returned together with a non-empty Composio log/request ID when available.

Never expose `COMPOSIO_API_KEY` to the browser, logs, source control, URLs, or user-facing responses.

## Components

### Composio configuration

Add a server-only configuration entry that reads `COMPOSIO_API_KEY` from the runtime environment. `.env.example` may document the variable name with no real secret value.

### Composio service

Add a focused service class that owns Composio API/session behavior. It must provide explicit methods for session creation/resume, connection management, tool discovery, and tool execution. HTTP transport, authentication headers, timeouts, and error normalization belong here.

### User identity mapping

Reuse Everpost's existing authenticated user identifier. Do not create a second account system. The mapping must be deterministic so the same Everpost user always resolves to the same Composio identity.

### Application endpoint / agent boundary

Expose only the minimum server endpoint or existing agent action necessary to initiate GitHub connection and perform the verification call. Preserve existing Laravel authorization and CSRF/session conventions.

## Error Handling

Normalize Composio failures into application-level errors without leaking secrets or raw credentials.

Distinguish at minimum:

- missing server configuration;
- invalid Composio project credential;
- integration not yet connected;
- expired or failed provider authorization;
- unknown/missing tool discovered at runtime;
- provider execution failure;
- network/timeout failure.

Capture and surface the Composio log/request ID for support and diagnostics whenever one is returned.

## Verification

Implementation is considered working only when all of the following are true:

1. The production/server runtime can detect `COMPOSIO_API_KEY` without exposing its value.
2. An authenticated Everpost user receives a valid GitHub Connect Link when not connected.
3. After authorization, the same Everpost user resumes the same Composio identity/session context.
4. James/Everpost discovers a real GitHub read-only tool at runtime.
5. That tool executes successfully against the connected GitHub account and returns a real provider result.
6. A non-empty Composio log/request ID is captured when the API provides one.
7. Relevant automated tests pass and no secret is committed to GitHub.

A tool search, schema fetch, generated Connect Link, mock response, or session creation by itself does not count as proof.

## Testing Strategy

Use focused Laravel tests around the service and request/agent boundary. Mock outbound Composio HTTP requests for unit/feature tests, covering the success path and the error categories above. The final integration verification is a safe real read-only GitHub call using the deployed/runtime credential and a user-authorized connection.

## Scope

Included now:

- Composio Platform connection from Everpost;
- user-scoped session/identity handling;
- GitHub authorization through Composio;
- one real read-only GitHub tool call;
- reusable service boundary for later integrations.

Not included now:

- bulk connection of every supported app;
- custom OAuth branding;
- a separate Node/Python service;
- new user/account architecture;
- write actions such as posting, sending email, or changing GitHub data;
- unrelated refactoring of the existing social scheduling code.

## Follow-on Integrations

After the GitHub proof succeeds, the same boundary can be extended to Gmail, Google Calendar, Slack, Notion, and other supported Composio toolkits. Each new integration should be added only when James has a concrete workflow that needs it.
