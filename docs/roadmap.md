# Lang Module Roadmap

"Abbattiamo le barriere: la lingua come servizio universale."

## 🎯 Visione
Trasformare il modulo Lang in un sistema di gestione linguistica intelligente che non solo fornisce traduzioni statiche, ma è in grado di generare contenuti multilingue on-the-fly tramite AI, mantenendo la coerenza del brand.

## 🏗️ Fasi di Sviluppo

### Fase 1: Stability & Cleanup (In Progress)
- [x] PHPStan Level 10 Compliance.
- [ ] Rimozione definitiva dei 260+ file obsoleti di documentazione.
- [ ] Centralizzazione di tutti i file di lingua dei moduli in un unico spazio di gestione (DAB).
- [ ] Automazione completa del comando `lang:publish` per tutti i moduli.

### Fase 2: Developer Experience (Planned)
- [ ] Creazione di una CLI interattiva per aggiungere chiavi senza lasciare l'IDE.
- [ ] Sistema di "Warning" nel Build Time se mancano traduzioni per chiavi usate nel codice.
- [ ] Integrazione migliorata con **Filament v5 Clusters** per la gestione permessi lingua.

### Fase 3: AI & Dynamics (Future)
- [ ] **AI-AutoTranslate**: Traduzione basata su contesto (LLM) dei file `.php` preservando array keys.
- [ ] **Dynamic Pluralization**: Sistema avanzato per lingue con regole di pluralizzazione complesse.
- [ ] **Translation Memory**: Database condiviso delle traduzioni approvate per garantire uniformità terminologica.

## ✅ Checklist Qualità
- [x] PHPStan Level 10.
- [ ] Zero hardcoded strings nei layout Blade (verifica via tool).
- [ ] Test di risoluzione delle chiavi multilingue per ogni modulo.

---
**Ultimo aggiornamento**: 31 Gennaio 2026
