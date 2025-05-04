# Fake Airbnb Listings Viewer

This project demonstrates how to integrate **PHP**, **MySQL**, **Bootstrap 5**, and **JavaScript/jQuery** to create a dynamic web application that searches and displays fake Airbnb-style listings from a database.

The app includes form-based filtering, dynamic results displayed as cards, and modals populated via AJAX and SQL queries.

---

## 🛠️ Setup Instructions

1. **Clone this repository** and open it in a Codespace or your preferred PHP development environment.
2. Ensure your database is connected using the credentials defined in `config/config.php`.
3. Use the provided SQL structure and seed data (if applicable) to populate your `fakeAirbnb` database.

---

## 📁 File Overview

### `index.php`
- The **main search page**.
- Uses **Bootstrap 5** form elements:
  - **Neighborhood** (select menu, alphabetized via SQL)
  - **Room Type** (select menu, alphabetized via SQL)
  - **Number of Guests** (select menu from PHP’s `range(1,10)`)
- Form uses the `GET` method and submits to `results.php`.

### `results.php`
- Receives `GET` data from the search form.
- Displays up to **20 listings** using **Bootstrap cards** in a flexbox grid.
- Each card includes:
  - Listing image
  - Listing name
  - Price
  - Room type
  - Rating
  - Neighborhood
- Clicking the **"View"** button opens a Bootstrap **modal** populated dynamically via AJAX.

### `js/script.js`
- Uses **jQuery** to:
  - Handle View button clicks.
  - Send an AJAX request to `src/ajax.php` with the selected listing ID.
  - Populate the modal with the returned data.

### `src/ajax.php`
- Receives the listing ID via `$_GET`.
- Uses functions in `functions.php` to:
  - Connect to the database
  - Run SQL queries
  - Return the result as **JSON**

### `src/functions.php`
- Centralized PHP functions for:
  - Database connections
  - Query execution
  - Reusability across `index.php`, `results.php`, and `ajax.php`

### `config/config.php`
Defines DB constants:
```php
define("SERVER", "mysqlServer");
define("PORT", "3306");
define("USERNAME", "fakeAirbnbUser");
define("PASSWORD", "apples11Million");
define("DATABASE", "fakeAirbnb");
