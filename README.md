# 🌍 Travel Bucketlist App

## 📌 Projectomschrijving
De Travel Bucketlist App is een webapplicatie waarmee gebruikers hun eigen reisbestemmingen kunnen opslaan, bekijken en beheren.  
Het doel van de applicatie is om gebruikers te helpen hun droomreizen te organiseren en bij te houden.

Deze applicatie is ontwikkeld als backend eindproject.

---

## ⚙️ Functionaliteiten
- Registreren en inloggen van gebruikers
- Toevoegen van reisbestemmingen
- Bewerken en verwijderen van items
- Filteren en zoeken in bestemmingen
- Opslaan van data in een MySQL database
- Beveiligde sessies (login system)

---

## 🛠️ Technieken gebruikt
- PHP (backend logica)
- MySQL (database)
- HTML/CSS (frontend structuur)
- Bootstrap (styling)
- XAMPP / phpMyAdmin

---

## 💾 Installatie instructies

### 1. Project downloaden
Download of clone de repository:https://github.com/wengelo/travel-bucketlist.git



### 2. Database importeren
- Open phpMyAdmin
- Maak een nieuwe database aan: `travel_bucketlist`
- Klik op Import
- Selecteer het bestand `database.sql`

### 3. Configuratie
Controleer in `includes/db.php` of je database instellingen kloppen:

```php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "travel_bucketlist";
