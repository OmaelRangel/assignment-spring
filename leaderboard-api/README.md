# Leaderboard API (Laravel)

This is the **backend API** for the Leaderboard Application, built with Laravel. It manages users, scores, sorting, and the winner declaration process.

---

## 🚀 Getting Started

### 1. Clone the Repository
```sh
git clone https://github.com/OmaelRangel/assignment-spring.git
cd assignment-spring/leaderboard-api
```

### 2. Install Dependencies
```sh
composer install
```

### 3. Set Up Environment
Copy the example `.env` file and configure the database:
```sh
cp .env.example .env
```

Use SQLite by making sure your `.env` file contains:
```ini
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

### 4. Set Up the Database
Create the SQLite database file and run migrations:
```sh
touch database/database.sqlite
php artisan migrate --seed
```

### 5. Run the API
```sh
php artisan serve
```
The API will run at **`http://127.0.0.1:8000`**.

---

## 📌 API Endpoints
| Method  | Endpoint                        | Description                   |
|---------|--------------------------------|-------------------------------|
| **GET**  | `/api/users`                   | Get all users                 |
| **POST** | `/api/users`                   | Create a new user             |
| **DELETE** | `/api/users/{id}`            | Delete a user                 |
| **PATCH** | `/api/users/{id}/points`      | Update user points            |
| **GET**  | `/api/users/{id}`              | Get user details              |
| **POST** | `/api/update-score/{id}`       | Change user score (+/-)       |
| **POST** | `/api/users/reset-scores`     | Reset all user scores         |
| **GET**  | `/api/leaderboard`             | Get users grouped by score    |
| **GET**  | `/api/winners`                 | Get the winners table         |

Example request to **update score**:
```sh
curl -X POST http://127.0.0.1:8000/api/update-score/1 -H "Content-Type: application/json" -d '{"points": 5}'
```

---

## 📌 Features
✅ **Users start with 0 points**  
✅ **Add, delete, and update users dynamically**  
✅ **Order leaderboard by name or points**  
✅ **Scheduled job identifies a winner every 5 minutes**  
✅ **QR code generation for user addresses**  
✅ **Database pre-filled with test users**  

---

## 📌 Extra Commands

### Run Unit Tests
```sh
php artisan test
```

### Manually Reset Scores
```sh
php artisan reset:scores
```

### Manually Declare a Winner
```sh
php artisan declare:winner
```

---

## 📌 Project Structure
```
leaderboard-api/
│── app/
│   ├── Console/Commands/DeclareWinner.php  # CLI Command
│   ├── Http/Controllers/UserController.php # API Logic
│   ├── Models/User.php  # User Model
│   ├── Models/Winner.php  # Winner Model
│   ├── Jobs/GenerateQRCode.php  # QR Code Job
│── database/
│   ├── migrations/  # Schema Migrations
│   ├── seeders/UserSeeder.php  # Test Data
│── routes/
│   ├── api.php  # API Routes
│── tests/
│   ├── Feature/UserTest.php  # API Tests
│   ├── Feature/LeaderboardTest.php  # Leaderboard Tests
│── public/
│── README.md  # This file
```

---

## 📌 Deployment Notes
This API is **SQLite-based** for simplicity. The database is pre-configured for local development, so no extra setup is needed.

To restart fresh, you can reset the database with:
```sh
rm database/database.sqlite && touch database/database.sqlite
php artisan migrate --seed
```


