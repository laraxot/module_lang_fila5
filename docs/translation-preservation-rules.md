# Regole Critiche per la Preservazione delle Traduzioni

## ⚠️ REGOLA ASSOLUTA: MAI RIMUOVERE CONTENUTO

**Le traduzioni sono un patrimonio del progetto che deve essere sempre preservato e mai ridotto.**

## 🎯 TERMINOLOGIA CORRETTA PER LINGUA

### Regola Fondamentale: Traduzioni Appropriate
- **Italiano**: "Referto" (NON "Report") - specialmente in ambito medico/odontoiatrico
- **Inglese**: "Report" 
- **Tedesco**: "Bericht"

### Esempi di Terminologia Corretta

#### ✅ CORRETTO - Italiano
```php
// Stati appuntamenti
'report_pending' => [
    'label' => 'Referto in attesa',
    'modal_description' => 'Il referto odontoiatrico è in attesa di compilazione',
],

// Modulo <nome modulo>
'model' => [
    'label' => 'Referto Odontoiatrico',
    'plural' => 'Referti Odontoiatrici',
    'description' => 'Gestione completa dei referti odontoiatrici',
],
```

#### ✅ CORRETTO - Inglese
```php
'report_pending' => [
    'label' => 'Report Pending',
    'modal_description' => 'The dental report is pending completion',
],
```

#### ✅ CORRETTO - Tedesco
```php
'report_pending' => [
    'label' => 'Bericht ausstehend',
    'modal_description' => 'Der zahnärztliche Bericht wartet auf Vervollständigung',
],
```

#### ❌ ERRATO - Mai usare "Report" in italiano
```php
// ❌ MAI FARE QUESTO
'report_pending' => [
    'label' => 'Report in attesa',  // ERRORE: dovrebbe essere "Referto"
    'modal_description' => 'Il report odontoiatrico è in attesa',  // ERRORE
],
```

## Principi Fondamentali

1. **PRESERVAZIONE TOTALE**
   - MAI rimuovere chiavi di traduzione esistenti
   - MAI eliminare contenuto dalle traduzioni
   - MAI "pulire" traduzioni apparentemente non utilizzate

2. **SOLO AGGIUNTE E MIGLIORAMENTI**
   - ✅ Aggiungere nuove chiavi quando necessario
   - ✅ Migliorare traduzioni esistenti (grammatica, chiarezza)
   - ✅ Espandere strutture incomplete
   - ✅ Correggere terminologia (es. "report" → "referto" in italiano)
   - ❌ MAI rimuovere o eliminare

3. **MOTIVAZIONI**
   - Le traduzioni riflettono l'evoluzione del sistema
   - Contenuto "vecchio" potrebbe essere riutilizzato
   - Mantenere compatibilità con versioni precedenti
   - Rispettare la terminologia specifica del dominio (medico/odontoiatrico)

## Terminologia Specifica per Dominio

### Ambito Medico/Odontoiatrico

#### Italiano
- **Referto** (non "Report") - Documento medico
- **Visita** (non "Appointment") - Controllo medico
- **Paziente** (non "Patient") - Persona in cura
- **Dottore** (non "Doctor") - Medico
- **Studio** (non "Office") - Ambulatorio

#### Inglese
- **Report** - Medical document
- **Appointment** - Medical visit
- **Patient** - Person under care
- **Doctor** - Medical professional
- **Office** - Medical facility

#### Tedesco
- **Bericht** - Medizinischer Bericht
- **Termin** - Arzttermin
- **Patient** - Person unter Behandlung
- **Arzt** - Medizinischer Fachmann
- **Praxis** - Arztpraxis

## Checklist per Nuove Traduzioni

Prima di aggiungere nuove traduzioni, verificare:

- [ ] **Terminologia corretta** per la lingua target
- [ ] **Consistenza** con traduzioni esistenti
- [ ] **Completezza** della struttura (label, placeholder, help, tooltip)
- [ ] **Grammatica e ortografia** corrette
- [ ] **Contesto appropriato** per il dominio (medico/odontoiatrico)
- [ ] **Nessun contenuto rimosso** dalle traduzioni esistenti

## Esempi di Correzione Terminologica

### Prima (Errato)
```php
// ❌ ERRATO
'navigation' => [
    'label' => 'Report Odontoiatrici',
    'group' => 'Gestione Report',
    'tooltip' => 'Gestisci tutti i report odontoiatrici',
],
```

### Dopo (Corretto)
```php
// ✅ CORRETTO
'navigation' => [
    'label' => 'Referti Odontoiatrici',
    'group' => 'Gestione Referti',
    'tooltip' => 'Gestisci tutti i referti odontoiatrici',
],
```

## Documentazione delle Modifiche

Ogni correzione terminologica deve essere documentata:

1. **Motivazione**: Perché la correzione è necessaria
2. **Impatto**: Quali file sono stati modificati
3. **Verifica**: Controllo che non siano stati rimossi contenuti
4. **Test**: Verifica che le traduzioni funzionino correttamente

## Collegamenti

- [Best Practice Traduzioni](translation-best-practices.md)
- [Terminologia Medica](medical-terminology.md)
- [Standard Localizzazione](localization-standards.md)

---

**Ultimo aggiornamento**: Gennaio 2025  
**Regola Critica**: MAI rimuovere contenuto dalle traduzioni, SOLO aggiungere o migliorare  
**Terminologia**: "Referto" in italiano, "Report" in inglese, "Bericht" in tedesco 