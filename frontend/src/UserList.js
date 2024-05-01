import React, { useState, useEffect } from 'react';

function UserList() {
  const [users, setUsers] = useState([]);

  useEffect(() => {
    const fetchUsers = async () => {
      try {
        const response = await fetch('http://localhost:8000/api/users');
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        const data = await response.json();
        setUsers(data);
      } catch (error) {
        console.error('Error fetching users:', error);
      }
    };

    fetchUsers();
  }, []);

  return (
    <div>
      <h1>Lista użytkowników</h1>
      <ul>
        {users.map(user => (
          <li key={user.id}>
            ID: {user.id}, Name: {user.name}
          </li>
        ))}
      </ul>
    </div>
  );
}

export default UserList;


