# Webservice Users - REST API

Questo progetto fornisce un semplice web service RESTful in PHP per la gestione degli utenti (registrazione, login, logout) con autenticazione tramite sessione.

## Struttura delle cartelle

```
webservice_users/
│
├── config/
│   └── database.php
│
├── models/
│   └── users.php
│
├── users/
│   ├── login.php
│   ├── logout.php
│   └── register.php
│
└── webservice_users.sql
```

## Descrizione file

- **config/database.php**  
  Gestisce la connessione al database MySQL/MariaDB.

- **models/users.php**  
  Contiene la classe `users` con i metodi per registrazione, login e logout.

- **users/register.php**  
  Endpoint REST per la registrazione di un nuovo utente (`POST`).

- **users/login.php**  
  Endpoint REST per il login utente (`POST`).

- **users/logout.php**  
  Endpoint REST per il logout utente (`POST`).

- **webservice_users.sql**  
  Script SQL per creare la tabella `users` nel database.

## Esempi di richieste

### 1. Registrazione (`POST /users/register.php`)

**Body JSON:**
```json
{
  "username": "pippo",
  "password": "pippo123",
  "email": "pippo@email.com"
}
```

### 2. Login (`POST /users/login.php`)

**Body JSON:**
```json
{
  "username": "pippo",
  "password": "pippo123"
}
```

### 3. Logout (`POST /users/logout.php`)

**Body JSON:**
```json
{}
```

## Note

- Tutte le risposte sono in formato JSON.
- Gli endpoint accettano solo richieste `POST`.
- La password viene salvata in chiaro per semplicità: **in produzione usa sempre password hashate** con `password_hash()` e `password_verify()`.

## Installazione

1. Importa il file `webservice_users.sql` nel tuo database MySQL/MariaDB.
2. Configura le credenziali del database in `config/database.php` se necessario.
3. Assicurati che il server Apache/PHP abbia le sessioni abilitate.
4. Usa Postman per testare gli endpoint.

---

**Autore:**  
Tommaso Buselli.
