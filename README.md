# Symfony web + API

The reference implementation: Symfony 7.4 LTS on PHP 8.3. It serves the whole web experience (Twig) and the API, and it owns the shared MySQL schema and its Doctrine migrations.

Repository: `Faka-iAction/api-symfony-public` (FAKA iAction platform, Symfony web + API component).

## Status

Skeleton. This repository shows how the private implementation is organised, not the implementation itself:

- The source files keep their namespaces or imports, declarations, documentation and public signatures. Method and function bodies are replaced by a line that throws "Not published". Private members are left out.
- Everything else (templates, styles, tests, migrations, assets, platform projects, environment files) is not published.
- [STRUCTURE.md](STRUCTURE.md) lists every file of the private repository and says which are published, which keep signatures only, and which are not published.

It is regenerated from the private repository by the platform's sync tool. It does not build or run on its own.

## Visibility

This repository is **public**. Everything in it is visible to anyone. It holds only sanitised content: no secrets, credentials, production infrastructure details, risk thresholds or commercial terms.

## Architecture

This component follows the FAKA iAction master architecture. FAKA iAction is the platform; FAKA iRequest is one vertical on it.

## Licence

All rights reserved, with a limited permission for educational use. See [LICENSE.md](LICENSE.md). The licence is a draft pending legal review.
