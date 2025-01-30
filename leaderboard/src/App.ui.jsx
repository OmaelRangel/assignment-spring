import { useState } from "react";

const initialUsers = [
    { id: 1, name: "Emma", points: 25 },
    { id: 2, name: "Noah", points: 18 },
    { id: 3, name: "James", points: 17 },
    { id: 4, name: "William", points: 6 },
    { id: 5, name: "Olivia", points: 3 },
];

function App() {
    const [users, setUsers] = useState(initialUsers);

    const updatePoints = (id, change) => {
        setUsers(users.map(user =>
            user.id === id ? { ...user, points: user.points + change } : user
        ));
    };

    const deleteUser = (id) => {
        setUsers(users.filter(user => user.id !== id));
    };

    const addUser = () => {
        const name = prompt("Enter user name:");
        if (name) {
            setUsers([...users, { id: Date.now(), name, points: 0 }]);
        }
    };

    return (
        <div className="p-4 max-w-md mx-auto">
            <table className="w-full border-collapse border border-gray-300">
                <tbody>
                    {users.sort((a, b) => b.points - a.points).map(user => (
                        <tr key={user.id} className="border">
                            <td>
                                <button onClick={() => deleteUser(user.id)}>❌</button>
                            </td>
                            <td className="p-2">{user.name}</td>
                            <td>
                                <button onClick={() => updatePoints(user.id, 1)}>➕</button>
                                <button onClick={() => updatePoints(user.id, -1)}>➖</button>
                            </td>
                            <td className="p-2">{user.points} points</td>
                        </tr>
                    ))}
                </tbody>
            </table>
            <button className="mt-4 p-2 border" onClick={addUser}>➕ Add User</button>
        </div>
    );
}

export default App;
