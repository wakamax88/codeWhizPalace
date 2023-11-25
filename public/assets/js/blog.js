"use strict";

let likeBtns = document.querySelectorAll(".like");
let cards = document.querySelectorAll(".card");


let actionYes = document.getElementById("actionYes");

let actionBtn = document.getElementById("action");

let contentSendEl = document.querySelector("#content");
let titleEl = document.querySelector("#title");
let thumbnailEl = document.querySelector("#thumbnail");
let altEl = document.querySelector("#alt");
let exercptEl = document.querySelector("#exercpt");
let categoryEl = document.getElementById("category");
let titleModalEditEl = document.querySelector("#titleModalEdit");
let contentModalDeleteEl = document.querySelector("#modal-delete .modal-body");
let titleModalDeleteEl = document.getElementById("titleModalDelete");
let post_id = "";
var options = {
  debug: "info",
  placeholder: "Compose an epic...",
  readOnly: false,
  theme: "snow",
};
const quill = new Quill("#contentVisual", options);

quill.on("text-change", function () {
  contentSendEl.value = quill.root.innerHTML;
});



const like = async (event) => {
  event.stopImmediatePropagation();
  console.log("like");
  let post_id = getPostId(event);
  const data = {
    token: document.querySelector(".token").value,
  };
  try {
    let response = await fetch(`/app/blog/posts/${post_id}/likes`, {
      method: "PATCH",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    });
    response = await response.json();
    if(response.success) {
      const message = response.message;
      alertBox(message, "success");
    } else {
      alertBox(message, "warning");
    }
    setTimeout(() => {
      window.location.reload();
    }, 3000);
  } catch(error) {
    alertBox(error, "danger");
  }
};





const openReadModal = async (event) => {
  let post_id = getId(event);
  let post = await getById(post_id, 'posts', 'blog');
  let contentModalEl = document.querySelector(".modal-body");
  let titleModalEl = document.querySelector(".modal-title");
  titleModalEl.textContent = post.title;
  contentModalEl.innerHTML = post.content;
  modalReadEl.classList.toggle("show");
};

const clearData = () => {
  titleEl.value = "";
  altEl.value = "";
  contentSendEl.value = "";
  exercptEl.value = "";
  quill.setText("");
}




const openDeleteModal = (event) => {
  event.stopImmediatePropagation();
  post_id = getId(event);
  titleModalDeleteEl.textContent = "Delete Post";
  contentModalDeleteEl.textContent =
    "Veuillez confirmer pour supprimer cet article";
  actionYes.addEventListener("click", () => {
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
  });
  modalDeleteEl.classList.toggle("show");
};

const openCreateModal = async (event) => {
  event.stopImmediatePropagation();
  actionBtn.value = "save";
  actionBtn.textContent = "Save";
  titleModalEditEl.textContent = "Create Post";

  let categories = await getCategories();

  categories.forEach((categories, key) => {
    categoryEl[key] = new Option(categories["name"], categories["id"]);
  });

  actionBtn.addEventListener("click", async () => {
    let formData = getFormPost();
    let url = `/app/blog/posts`;
    let option = {
      method: "POST",
      body: formData,
    };
    postData(url, option);
  });
  modalEditEl.classList.toggle("show");
};

const openEditModal = async (event) => {
  event.stopImmediatePropagation();
  actionBtn.value = "update";
  actionBtn.textContent = "Update";
  titleModalEditEl.textContent = "Edit Post";
  post_id = getId(event);
  let post = await getById(post_id, 'posts', 'blog');
  let categories = await getCategories();

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

  titleEl.value = post.title;
  exercptEl.value = post.excerpt;
  content.value = post.content;
  contentSendEl.value = post.content;
  altEl.value = post.alt;

  const delta = quill.clipboard.convert(post.content);
  quill.setContents(delta, "silent");

  actionBtn.addEventListener("click", () => {
    const data = {
      token: document.querySelector(".token").value,
      title: titleEl.value,
      alt: altEl.value,
      content: contentSendEl.value,
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
    let url = `/app/blog/posts/update/${post_id}`;
    postData(url, option);
  });

  modalEditEl.classList.toggle("show");
};

const getFormPost = () => {
  let token = document.querySelector(".token");
  let title = titleEl.value;
  let alt = altEl.value;
  let thumbnail = thumbnailEl.files[0];
  let content = contentSendEl.value;
  let excerpt = exercptEl.value;
  let categoryId = categoryEl.value;
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





