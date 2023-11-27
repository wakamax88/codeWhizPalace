"use strict";

let likeBtns = document.querySelectorAll(".like");
let cards = document.querySelectorAll(".card");


const contentEl = document.getElementById("content");
const titleEl = document.getElementById("title");
const thumbnailEl = document.getElementById("thumbnail");
const altEl = document.getElementById("alt");
const exercptEl = document.getElementById("exercpt");
const categoryEl = document.getElementById("category");

let post_id = "";

/* Editor Quill */
const options = {
  debug: "info",
  placeholder: "Compose an epic...",
  readOnly: false,
  theme: "snow",
};
const quill = new Quill("#contentVisual", options);
quill.on("text-change", function () {
  contentEl.value = quill.root.innerHTML;
});

const like = (event) => {
  event.stopImmediatePropagation();
  post_id = getId(event);
  const data = {
    token: document.querySelector(".token").value,
  };
  const option = {
    method: "PATCH",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  };
  const url = `/app/blog/posts/${post_id}/likes`;
  postData(url, option);
};

const openReadModal = async (event) => {
  post_id = getId(event);
  let post = await getById(post_id, 'posts', 'blog');
  titleModalReadEl.textContent = post.title;
  bodyModalReadEl.innerHTML = post.content;
  modalReadEl.classList.toggle("show");
};

const clearData = () => {
  titleEl.value = "";
  altEl.value = "";
  contentEl.value = "";
  exercptEl.value = "";
  quill.setText("");
}

const openDeleteModal = (event) => {
  event.stopImmediatePropagation();
  post_id = getId(event);
  titleModalDeleteEl.textContent = "Delete Post";
  bodyModalDeleteEl.textContent =
    "Veuillez confirmer pour supprimer";
  modalDeleteEl.classList.toggle("show")
};

const openCreateModal = async (event) => {
  event.stopImmediatePropagation();
  actionModalEditBtn.value = "create";
  titleModalEditEl.textContent = "Create Post";
  const categories = await getCategories();
  categories.forEach((categories, key) => {
    categoryEl[key] = new Option(categories["name"], categories["id"]);
  });
  modalEditEl.classList.toggle("show");
};

const openEditModal = async (event) => {
  actionModalEditBtn.value = "update";
  event.stopImmediatePropagation();
  post_id = getId(event);
  const post = await getById(post_id, 'posts', 'blog');
  const categories = await getCategories();
  categories.forEach((categories, key) => {
    if(categories["id"] == post.category_id) {
      categoryEl[key] = new Option(
        categories["name"],
        categories["id"],
        true,
        true
      );
    } else {
      categoryEl[key] = new Option(categories["name"], categories["id"]);
    }
  });
  titleModalEditEl.textContent = "Edit Post";
  titleEl.value = post.title;
  exercptEl.value = post.excerpt;
  contentEl.value = post.content;
  altEl.value = post.alt;
  const delta = quill.clipboard.convert(post.content);
  quill.setContents(delta, "silent");
  modalEditEl.classList.toggle("show");
};

const getFormPost = () => {
  let token = document.querySelector(".token");
  const title = titleEl.value;
  const alt = altEl.value;
  const thumbnail = thumbnailEl.files[0];
  const content = contentEl.value;
  const excerpt = exercptEl.value;
  const categoryId = categoryEl.value;
  const formData = new FormData();
  formData.append("thumbnail", thumbnail);
  formData.append("title", title);
  formData.append("token", token.value);
  formData.append("excerpt", excerpt);
  formData.append("alt", alt);
  formData.append("content", content);
  formData.append("categoryId", categoryId);
  return formData;
};


// Event Listener
cards.forEach((card) => {
  card.addEventListener("click", openReadModal);
});

likeBtns.forEach((likeBtn) => {
  likeBtn.addEventListener("click", like);
});

// CRUD POST
const deleteData = () => {
  const data = {
    token: document.querySelector(".token").value,
  };
  const option = {
    method: "DELETE",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  };
  const url = `/app/blog/posts/delete/${post_id}`;
  postData(url, option);
}

const updateData = () => {
  const data = {
    token: document.querySelector(".token").value,
    title: titleEl.value,
    alt: altEl.value,
    content: contentEl.value,
    excerpt: exercptEl.value,
    categoryId: categoryEl.value,
  };
  const option = {
    method: "PATCH",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  };
  const url = `/app/blog/posts/update/${post_id}`;
  postData(url, option);
}

const createData = () => {
  console.log('create');
  const formData = getFormPost();
  console.log(formData);
  const url = `/app/blog/posts`;
  const option = {
    method: "POST",
    body: formData,
  };
  postData(url, option);
}



