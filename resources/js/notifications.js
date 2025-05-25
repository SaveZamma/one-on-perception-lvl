const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

let deleteBtns = document.querySelectorAll('button.delete-btn');
let readBtns = document.querySelectorAll('button.read-btn');


function mapToJsonOrNull(response) {
    return response.ok 
        ? response.json().then(data => ({ data: data, status: response.status })) 
        : null;
}

function changeReadBtnIcon(btn, showOpen)
{
    const open = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" alt="open envelope" class="primary button">
                    <path d="M64 208.1L256 65.9 448 208.1l0 47.4L289.5 373c-9.7 7.2-21.4 11-33.5 11s-23.8-3.9-33.5-11L64 255.5l0-47.4zM256 0c-12.1 0-23.8 3.9-33.5 11L25.9 156.7C9.6 168.8 0 187.8 0 208.1L0 448c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-239.9c0-20.3-9.6-39.4-25.9-51.4L289.5 11C279.8 3.9 268.1 0 256 0z"/>
                </svg>`;
    const closed = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" alt="closed envelope" class="primary button">
                    <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                </svg>`;
    const innerSpan = btn.querySelector('span');
    innerSpan.innerHTML = showOpen ? open : closed;    
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
            throw new Error('Failed to delete notification');
        } else {
            Toastify({
                text: "Notification deleted",
                duration: 2000,
                close: true,
                style: {
                    background: "linear-gradient(to right, #29A3A3, #FE7171)",
                },
            }).showToast();
            const ul = btn.parentElement.parentElement.parentElement;
            if (ul.children.length == 1) { //is last element
                ul.innerHTML = `<p>You have zero notification.</p>`;
            }
            btn.parentElement.parentElement.remove()
        }
    });
}

function toggleRead(btn) {
    const route = "/notification/toggleRead";
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
            throw new Error('Failed to toggle notification read');
        } else {
            Toastify({
                text: "Done!",
                duration: 2000,
                close: true,
                style: {
                    background: "linear-gradient(to right, #29A3A3, #FE7171)",
                },
            }).showToast();
            btn.dataset.read = btn.dataset.read == "true" ? "false" : "true";
            changeReadBtnIcon(btn, btn.dataset.read == "true");
        }
    });
}

for (let btn of deleteBtns) {
    btn.addEventListener('click', function (e) { deleteNotification(btn) });
}
for (let btn of readBtns) {
    btn.addEventListener('click', function (e) { toggleRead(btn) });
}
