const SortButtons = ({ onSort }) => {
    return (
        <div>
            <button onClick={() => onSort("name")}>Sort by Name</button>
            <button onClick={() => onSort("points")}>Sort by Points</button>
        </div>
    );
};

export default SortButtons;

