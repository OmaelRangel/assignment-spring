# 🏆 Leaderboard Application

This project is a **Full Stack Leaderboard Application** built with **Laravel (API)** and **React (Frontend)**. It allows users to be added, removed, and sorted based on scores while ensuring all backend requirements are met.

📽 **Demo Video:**
[![Watch Full Walkthrough](https://img.youtube.com/vi/IMJkGseKZWU/0.jpg)](https://youtu.be/IMJkGseKZWU)

## 📌 Assignment Requirements & Implementation

### ✅ **Frontend Implementation (React + Vite)**
- [x] **Implemented UI in a JavaScript framework** → Built with React + Vite.
- [x] **Click + / - to update leaderboard** → Score updates and reorders dynamically.
- [x] **Add and delete users** → Users can be added via a form and removed using ❌.
- [x] **Show user details** → Clicking a name displays age, points, and address.
- [x] **Search and filter names** → Search bar filters users in real-time.
- [x] **Sorting headers** → Users can be sorted alphabetically or by points.

### ✅ **Backend Implementation (Laravel API + SQLite)**
- [x] **API for leaderboard** → Endpoints power the frontend via RESTful API.
- [x] **Users start with 0 points** → Set by default in the database.
- [x] **Model factory for test users** → Populates database with random users.
- [x] **Laravel command to reset scores** → `php artisan reset:scores` command implemented.
- [x] **Endpoint grouping users by score & average age** → `/api/users/grouped-by-score` returns structured data.
- [x] **Queue job to generate QR codes** → User addresses are stored as QR codes.
- [x] **Scheduled job to identify leaderboard winners** → Runs every 5 minutes.
- [x] **Tiebreaker logic for winners** → If multiple users have the same highest score, no winner is recorded.

### ✅ **Additional Requirements**
- [x] **Project documentation** → README files included in both projects.
- [x] **Unit tests** → Key functionalities are tested.

## 📂 Project Structure
```
assignment-spring/
├── leaderboard/        # Frontend (React + Vite)
├── leaderboard-api/    # Backend (Laravel API + SQLite)
└── README.md           # You are here 🎉
```

## 🚀 Running the Project
### 1️⃣ Clone the Repository
```sh
git clone https://github.com/OmaelRangel/assignment-spring.git
cd assignment-spring
```
### 2️⃣ Start the API (Backend)
```sh
cd leaderboard-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

### 3️⃣ Start the Frontend
```sh
cd ../leaderboard
npm install
npm run dev
```
Frontend will run at **http://localhost:5173**, while the API is available at **http://localhost:8000**.

