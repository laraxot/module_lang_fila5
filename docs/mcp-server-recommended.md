---
module: theme
topic: mcp-server-recommended
canonical: ../../../Themes/docs/shared-components/mcp-server-recommended-Modules.md
---

## Scopo del Modulo
Gestione traduzioni, localizzazione e internazionalizzazione.

## Server MCP Consigliati
- `filesystem`: Per gestione file di traduzione e risorse linguistiche.
- `memory`: Per caching temporaneo delle traduzioni.

## Configurazione Minima Esempio
```json
{
  "mcpServers": {
    "filesystem": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-filesystem"] },
    "memory": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-memory"] }
  }
}
```

## Note
- Estendi la configurazione per supportare traduzioni dinamiche o servizi esterni.
<<<<<<< HEAD
# MCP Server Consigliati per il Modulo Lang

## Scopo del Modulo
Gestione traduzioni, localizzazione e internazionalizzazione.

## Server MCP Consigliati
- `filesystem`: Per gestione file di traduzione e risorse linguistiche.
- `memory`: Per caching temporaneo delle traduzioni.

## Configurazione Minima Esempio
```json
{
  "mcpServers": {
    "filesystem": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-filesystem"] },
    "memory": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-memory"] }
  }
}
```

## Note
- Estendi la configurazione per supportare traduzioni dinamiche o servizi esterni.
=======
>>>>>>> laraxot/dev
