# Leaderboard Frontend

This is the frontend for the Leaderboard application, built using **React + Vite**. It allows users to view, search, sort, add, update, and delete users on the leaderboard.

## 🚀 Features
- Display leaderboard with user scores.
- Sort users by **Name** or **Points**.
- Search users by name.
- Add new users.
- Update user scores using `+` and `-` buttons.
- Delete users from the leaderboard.
- View user details when clicking on a user's name.

## 🛠 Tech Stack
- **React** (Frontend framework)
- **Vite** (Fast development environment)
- **Axios** (For API requests)

## 📦 Installation & Setup

### 1️⃣ Clone the Repository
```sh
git clone https://github.com/OmaelRangel/assignment-spring.git
cd assignment-spring/leaderboard
```

### 2️⃣ Install Dependencies
```sh
npm install
```

### 3️⃣ Configure API URL
Ensure the API is running on `http://localhost:8000`.
If needed, update the API base URL in `src/services/api.js`:

```js
const API_BASE_URL = 'http://localhost:8000/api';
```

### 4️⃣ Start the Backend First
Before running the frontend, ensure the **Leaderboard API** is running. Navigate to `leaderboard-api/` and start it:
```sh
php artisan serve
```

### 5️⃣ Run the Frontend
```sh
npm run dev
```
This will start the frontend at `http://localhost:5173`.

## 🖥️ Project Structure
```
leaderboard/
├── src/
│   ├── components/  # React components (Leaderboard, SearchBar, etc.)
│   ├── services/    # API service (axios calls)
│   ├── App.jsx      # Main app component
│   ├── main.jsx     # App entry point
│   ├── index.css    # Global styles
├── public/          # Static assets
├── package.json     # Dependencies & scripts
├── vite.config.js   # Vite config
└── README.md        # You are here! 🎉
```

## ✨ Usage
- **Add User** → Fill out the form and submit.
- **Increase/Decrease Score** → Click `+` or `-` to update scores.
- **Delete User** → Click `❌` to remove a user.
- **Sort Users** → Click headers **Name** or **Points**.
- **Search Users** → Use the search bar to filter by name.
- **View User Details** → Click on a user's name.

## 🎯 Example Screenshots
