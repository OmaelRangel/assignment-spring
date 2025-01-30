import { useEffect, useState } from "react";
import { getUsers, updateUserScore, deleteUser } from "../services/api";
import SearchBar from "./SearchBar";  

const Leaderboard = ({ onSelectUser }) => {
    const [users, setUsers] = useState([]);
    const [searchQuery, setSearchQuery] = useState("");  
    const [sortBy, setSortBy] = useState("name"); 
    const [sortOrder, setSortOrder] = useState("asc"); 

    useEffect(() => {
        fetchUsers();
    }, []);

    const fetchUsers = async () => {
        const data = await getUsers();
        setUsers(data);
    };

    const handleUpdateScore = async (id, change) => {
        await updateUserScore(id, change);
        fetchUsers();
    };

    const handleDeleteUser = async (id) => {
        await deleteUser(id);
        fetchUsers();
    };

    const handleSort = (column) => {
        if (sortBy === column) {
            setSortOrder(sortOrder === "asc" ? "desc" : "asc");
        } else {
            setSortBy(column);
            setSortOrder("asc");
        }
    };

    const filteredUsers = users.filter(user =>
        user.name.toLowerCase().includes(searchQuery.toLowerCase())
    );

    const sortedUsers = [...filteredUsers].sort((a, b) => {
        if (sortBy === "name") {
            return sortOrder === "asc"
                ? a.name.localeCompare(b.name)
                : b.name.localeCompare(a.name);
        } else if (sortBy === "points") {
            return sortOrder === "asc" ? a.points - b.points : b.points - a.points;
        }
        return 0;
    });

    return (
        <div>
            <h1>Leaderboard</h1>

            {/* ✅ SearchBar is correctly placed */}
            <SearchBar onSearch={setSearchQuery} />

            <table>
                <thead>
                    <tr>
                        <th onClick={() => handleSort("name")}>
                            Name {sortBy === "name" ? (sortOrder === "asc" ? "▲" : "▼") : ""}
                        </th>
                        <th onClick={() => handleSort("points")}>
                            Points {sortBy === "points" ? (sortOrder === "asc" ? "▲" : "▼") : ""}
                        </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {sortedUsers.map(user => (
                        <tr key={user.id}>
                            <td onClick={() => onSelectUser(user)}>{user.name}</td>
                            <td>
                                <button onClick={() => handleUpdateScore(user.id, 1)}>+</button>
                                {user.points}
                                <button onClick={() => handleUpdateScore(user.id, -1)}>-</button>
                            </td>
                            <td>
                                <button onClick={() => handleDeleteUser(user.id)}>❌</button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default Leaderboard;

