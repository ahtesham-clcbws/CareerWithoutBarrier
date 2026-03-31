# Project Standards

## Coding Rules
- **Maximum File Length**: Avoid files > 500 lines. Critical files (> 1,000 lines) require immediate refactoring.
- **Strict Typing**: Use TypeScript interfaces or PHP DTOs when possible.
- **Contract-Based Development**: Prioritize Data Objects over raw arrays.
- **No Placeholders**: Avoid creating simple MVPs. UI must feel premium and state of the art.

## Development Standards
- All changes must be followed by a status update in `process_logs.md`.
- Implementation plans MUST be written in `backlog.md` before major architectural changes.

## Persistence
- All artifacts, logic maps, task lists, and historical decisions MUST be persisted in the `.agent/` folder.
