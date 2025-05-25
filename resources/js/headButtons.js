const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

const cartBtn = document.getElementById("header-cart-btn");
const notifsBtn = document.getElementById("header-notifications-btn");
const profileBtn = document.getElementById("header-profile-btn");

let hasNotifications = false;

checkNotifications();
setInterval(checkNotifications, 30000);


function addSpan(father, id, text = "") {
    const span = document.createElement("span");
    span.innerText = text;
    span.id = id;
    span.style = `
        color: white;
        background: var(--secondary);
        border-radius: 100px;
        display: block;
        text-align: center;
        font-size: xx-small;
        height: 10px;
        padding: 0 0 2px 0;
        width: 12px;
        position: relative;
        left: 8px;
        top: -20px;
        border: 1px white solid;`;
    father.appendChild(span);
}

function mapToJsonOrNull(response) {
    return response.ok 
        ? response.json().then(data => ({ data: data, status: response.status })) 
        : null;
}

function checkNotifications() {
    const route = "/notification/get";
     fetch(route, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
    })
    .then(response => mapToJsonOrNull(response))
    .then(data => data == null ? [] : data.data )
    .then(notifications => notifications.filter(n => !n.read))
    .then(n => {
        if (n.length > 0) {
            hasNotifications = true;
            if (document.getElementById("header-notifications-btn-span") == null) {
                const txt = n.length > 99 ? "99" : n.length;
                addSpan(notifsBtn, "header-notifications-btn-span", n.length);
            }        
        } else {
            hasNotifications = false;
            if (document.getElementById("header-notifications-btn-span") != null) {
                document.getElementById("header-notifications-btn-span").remove();
            }
        }
    }).then(x => console.log(x))

}
