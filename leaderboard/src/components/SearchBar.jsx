const SearchBar = ({ onSearch }) => {
    return (
        <input
            type="text"
            placeholder="Search users..."
            onChange={(e) => onSearch(e.target.value)}  // Updates parent searchQuery state
        />
    );
};

export default SearchBar;

