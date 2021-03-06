# Versioning and branching models

This file explains the versioning and branching models of this project.

> **Note**: `GnugatRedaktiloBundle`'s version isn't synchronized with
> Redaktilo's one (for e.g. the version 1.0.0 of the bundle uses the versions
> between 1.2.0 and 1.3.0 of the library).

## Versioning

The versioning is inspired by [Semantic Versioning](http://semver.org/):

> Given a version number MAJOR.MINOR.PATCH, increment the:
>
> 1. MAJOR version when you make incompatible API changes
> 2. MINOR version when you add functionality in a backwards-compatible manner
> 3. PATCH version when you make backwards-compatible bug fixes

### Public API

The public services are considered the API of this bundle, as well as the
supported tags.

## Branching Model

The branching is inspired by [@jbenet](https://github.com/jbenet)
[simple git branching model](https://gist.github.com/jbenet/ee6c9ac48068889b0912):

> 1. `master` must always be deployable.
> 2. **all changes** are made through feature branches (pull-request + merge)
> 3. rebase to avoid/resolve conflicts; merge in to `master`
