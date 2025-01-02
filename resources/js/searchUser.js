document.getElementById('searchButton').addEventListener('click', function () {
    const query = document.getElementById('name').value;

    if (query.trim() === '') {
        alert('Please enter a name to search.');
        return;
    }

    fetch(`/searchUser/${encodeURIComponent(query)}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
        .then(response => response.json())
        .then(data => {
            const resultsContainer = document.getElementById('searchResults');
            resultsContainer.innerHTML = '';

            if (data.length > 0) {
                data.forEach(user => {
                    const userElement = document.createElement('div');
                    userElement.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'mb-2');
                    userElement.innerHTML = `
                        <span>${user.name}</span>
                        <button class="btn btn-success btn-sm add-friend-button" data-user-id="${user.id}">Add</button>
                    `;
                    resultsContainer.appendChild(userElement);
                });

                document.querySelectorAll('.add-friend-button').forEach(button => {
                    button.addEventListener('click', function () {
                        const userId = this.getAttribute('data-user-id');

                        fetch('/addRequest', {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            },
                            body: JSON.stringify({ user_id: userId }),
                        })
                            .then(response => response.json())
                            .then(result => {
                                if (result.success) {
                                    alert('Friend request sent!');
                                } else {
                                    alert('Error adding friend.');
                                }
                            });
                    });
                });
            } else {
                resultsContainer.innerHTML = '<p>No users found.</p>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to fetch search results.');
        });
});
