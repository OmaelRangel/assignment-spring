import { useState } from "react";
import { addUser } from "../services/api";

const UserForm = ({ onUserAdded }) => {
    const [name, setName] = useState("");
    const [age, setAge] = useState("");
    const [address, setAddress] = useState("");

    const handleSubmit = async (e) => {
        e.preventDefault();
    if (!name || !age || !address) {
        alert("All fields are required.");
        return;
    }
        await addUser({ name, age, address });
        setName("");
        setAge("");
        setAddress("");
        onUserAdded();
    };

    return (
        <form onSubmit={handleSubmit}>
            <input placeholder="Name" value={name} onChange={e => setName(e.target.value)} />
            <input placeholder="Age" type="number" value={age} onChange={e => setAge(e.target.value)} />
            <input placeholder="Address" value={address} onChange={e => setAddress(e.target.value)} />
            <button type="submit">Add User</button>
        </form>
    );
};

export default UserForm;

