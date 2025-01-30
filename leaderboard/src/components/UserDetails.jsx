const UserDetails = ({ user }) => {
    if (!user) return <p>Select a user to see details</p>;

    return (
        <div>
            <h2>{user.name}</h2>
            <p>Age: {user.age}</p>
            <p>Address: {user.address}</p>
            <p>Points: {user.points}</p>
        </div>
    );
};

export default UserDetails;

