const form = document.querySelector("#bookForm");
const titleInput = document.querySelector("#title");
const authorInput = document.querySelector("#author");
const bookList = document.querySelector("#bookList");
const message = document.querySelector("#message");

form.addEventListener("submit", function (event) {
    event.preventDefault();

    const title = titleInput.value.trim();
    const author = authorInput.value.trim();

    if (!title || !author) {
        message.textContent = "Judul wajib diisi.";
        return;
    }

    const item = document.createElement("li");
    item.textContent = `${title} — ${author}`;
    bookList.appendChild(item);

    message.textContent = "Data Persistem berhasil ditambahkan pada tampilan.";
    form.reset();
});
