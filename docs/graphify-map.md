# Lang Module — Mappa Graphify

**Versione:** 1.0.0 | **Modulo:** Lang | **Data:** 2026-08-02

---

## 📌 Cosa fa il modulo Lang

Il modulo **Lang** gestisce:
- Localizzazione dinamica, traduzioni multilingua e gestione file di lingua monorepo

---

## 🏗️ Architettura Essenziale

### Entry Points

| Tipo | Classe | Path |
|------|--------|------|
| **Model** | `Translation` | `app/Models/Translation.php` |
| **Model** | `TranslationFile` | `app/Models/TranslationFile.php` |
| **Model** | `Post` | `app/Models/Post.php` |
| **Action** | `GetAllModuleTranslationAction` | `app/Actions/GetAllModuleTranslationAction.php` |
| **Action** | `MergeTranslationsAction` | `app/Actions/MergeTranslationsAction.php` |
| **Action** | `WriteTranslationFileAction` | `app/Actions/WriteTranslationFileAction.php` |
| **Action** | `PublishTranslationAction` | `app/Actions/PublishTranslationAction.php` |
| **Service** | `TranslatorService` | `app/Services/TranslatorService.php` |
| **Filament** | `TranslationFileResource` | `app/Filament/TranslationFileResource.php` |
| **Filament** | `LangBaseResource` | `app/Filament/LangBaseResource.php` |

### Dependencies (Incoming)

```
UI → Lang (stringhe componenti)
Tutti i moduli → Lang (traduzione chiavi)
```

### Dependencies (Outgoing)

```
Lang → Xot (helpers traduzione)
```

---

## 📊 Grafo Locale (Query Rapide)

### Scoprire Entità Core

```bash
graphify query "Lang module models and actions"
```

### Tracciare Flussi

```bash
graphify path --from "Translation" --to "GetAllModuleTranslationAction"
```

### Trovare Dipendenze

```bash
graphify query "Lang dependencies"
```

---

## 🎯 Task Comuni + Graphify

### Task 1: Estendere o Modificare Architettura Lang

**Domanda Graphify:**
```bash
graphify query "Lang module architecture and entry points"
```

**Workflow:**
1. Ispeziona classi in `app/Models` o `app/Actions`
2. Esegui query `graphify query "Lang dependencies"` per verificare impatto
3. Esegui test del modulo

---

## 📋 Test Coverage Map

```bash
graphify query "Lang module test coverage"
```

---

## 🚀 Comandi Rapidi

```bash
# Esplora architettura
graphify query "Lang module architecture"

# Test coverage
graphify query "Lang test coverage"

# Complexity
graphify query "Lang high complexity"
```

---

## 📚 Riferimenti

- **Graphify Central:** `docs/graphify-integration.md`
- **Module Discipline:** `docs/wiki/rules/module-naming-discipline.md`

---

**Responsabile:** @marco76tv | **Last updated:** 2026-08-02
