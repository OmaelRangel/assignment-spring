import { useState } from "react";
import Leaderboard from "./components/Leaderboard";
import UserDetails from "./components/UserDetails";
import UserForm from "./components/UserForm";

const App = () => {
    const [selectedUser, setSelectedUser] = useState(null);

    return (
        <div>
            <h1>Leaderboard App</h1>
            <UserForm onUserAdded={() => window.location.reload()} />
            <Leaderboard onSelectUser={setSelectedUser} />
            <UserDetails user={selectedUser} />
        </div>
    );
};

export default App;

