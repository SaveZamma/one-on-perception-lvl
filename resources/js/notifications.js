const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

let deleteBtns = document.querySelectorAll('button.delete-btn');


function mapToJsonOrNull(response) {
    return response.ok 
        ? response.json().then(data => ({ data: data, status: response.status })) 
        : null;
}

function deleteNotification(btn) {
    const route = '/notification/delete';
    const notifId = btn.dataset.notifId;
    fetch(route, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({ notification_id: notifId })
    })
    .then(response => mapToJsonOrNull(response))
    .then(data => {
        if (data === null) {
            throw new Error('Failed to toggle wishlist');
        } else {
            Toastify({
                text: "Notification deleted",
                duration: 2000,
                style: {
                    background: "linear-gradient(to right, #29A3A3, #FE7171)",
                },
            }).showToast();
            btn.parentElement.parentElement.remove()
        }
    });
}

for (let btn of deleteBtns) {
    btn.addEventListener('click', function (e) { deleteNotification(btn) });
}

