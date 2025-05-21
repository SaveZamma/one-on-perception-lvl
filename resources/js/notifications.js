const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

let deleteBtns = document.querySelectorAll('button.delete-btn');

for (let btn of deleteBtns) {
    btn.addEventListener('click', function (e) {
        const notifId = button.dataset.notifId;

        let url = this.getAttribute('href');
    });
}

