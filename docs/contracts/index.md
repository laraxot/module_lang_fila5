# Lang behavioral contract index

This is the machine-readable inventory of behavioral contracts owned by the **Lang** module.

A contract describes an existing public operation or boundary. It names the owner, input, output, stable invariants, side effects and their order, errors, and non-goals. Every invariant gets a stable ID and a Pest group when a test exists; missing coverage is recorded as debt instead of being implied away.

## Contracts

- [auto-label-action](auto-label-action.md)
- [clean-placeholder-translations-action](clean-placeholder-translations-action.md)
- [get-all-module-translation-action](get-all-module-translation-action.md)
- [get-all-translation-action](get-all-translation-action.md)
- [get-trans-path-action](get-trans-path-action.md)
- [language-switcher-component](language-switcher-component.md)
- [language-switcher-view-data](language-switcher-view-data.md)
- [language-switcher](language-switcher.md)
- [list-locale-options-action](list-locale-options-action.md)
- [merge-translations-action](merge-translations-action.md)
- [publish-translation-action](publish-translation-action.md)
- [read-translation-file-action](read-translation-file-action.md)
- [record-missing-translation-action](record-missing-translation-action.md)
- [get-default-translatable-locale-action](get-default-translatable-locale-action.md)
- [get-translatable-locales-action](get-translatable-locales-action.md)
- [save-trans-action](save-trans-action.md)
- [sync-translations-action](sync-translations-action.md)
- [trans-array-action](trans-array-action.md)
- [trans-collection-action](trans-collection-action.md)
- [write-translation-file-action](write-translation-file-action.md)

## Authoring

Use [Xot contract authoring standard](../../../Xot/docs/contracts/contract-authoring-standard.md) and the shared template. Legacy behavior is documented as-is and is not a model for new code.
