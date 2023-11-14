"use strict";

let likeBtns = document.querySelectorAll(".like");
let cards = document.querySelectorAll(".card");
let modalReadEl = document.getElementById('modal-read');
let closeModalBtns = document.querySelectorAll('.cwp-close-modal');
let token = document.querySelector(".token");
let optionBtns = document.querySelectorAll(".cwp-option-btn");
let editOptionLinks = document.querySelectorAll(".cwp-edit-option-link");
let deleteOptionLinks = document.querySelectorAll(".cwp-delete-option-link");
let modalDeleteEl = document.getElementById("modal-delete");
let modalEditEl = document.getElementById("modal-edit");
let modalCreateEl = document.getElementById("modal-create");
let addBtn = document.getElementById("add");
let saveBtn = document.getElementById("save");

// init editor text
var options = {
  debug: 'info',
  placeholder: 'Compose an epic...',
  readOnly: false,
  theme: 'snow'
};
const quill = new Quill('#content', options);

quill.on("text-change", function () {
  document.getElementById("contenu_wysiwyg").value = quill.root.innerHTML;
});

// return id post
const getPostId = (event) => {
  let cardEl = event.currentTarget.closest(".card");
  return cardEl.id;
}

// fetch update like
const like = (event) => {
  event.stopImmediatePropagation();
  console.log("like");
  let post_id = getPostId(event);

};

// return post
const getPostById = async (post_id) => {
  try {
    const response = await fetch(`/app/blog/posts/${post_id}`)
    let post = await response.json();
    return post;
  } catch(error) {
    console.log('🧨', error);
  }
}

const getCategories = async () => {
  try {
    let response = await fetch(`/app/admin/categories`)
    let categories = await response.json();
    return categories;
  } catch(error) {
    console.log('🧨', error);
  }

}

// fecth post id modal
const openReadModal = async (event) => {
  let post_id = getPostId(event);
  let post = await getPostById(post_id);

  let titleModalEl = modalReadEl.querySelector("h4");
  // let titlePostEl = modalReadEl.querySelector("#title");
  let contentModalEl = modalReadEl.querySelector(".modal-body");
  let exercptModalEl = modalReadEl.querySelector("exercpt");

  titleModalEl.textContent = post.title;
  contentModalEl.innerHTML = post.text;

  modalReadEl.classList.toggle("show");

};

const closeModal = () => {
  modalReadEl.classList.remove("show");
  modalDeleteEl.classList.remove("show");
  modalEditEl.classList.remove("show");
  modalCreateEl.classList.remove("show");
}

const openOption = (event) => {
  event.stopImmediatePropagation();
}

const openDeleteModal = (event) => {
  event.stopImmediatePropagation();
  let post_id = getPostId(event);


  let titleModalEl = modalDeleteEl.querySelector("h4");
  titleModalEl.textContent = "Delete Post";

  modalDeleteEl.classList.toggle("show");
}

const openCreateModal = (event) => {
  event.stopImmediatePropagation();
  let titleModalEl = modalCreateEl.querySelector("h4");
  titleModalEl.textContent = "Create Post";

  modalCreateEl.classList.toggle("show");
}

const openEditModal = async (event) => {
  event.stopImmediatePropagation();
  console.log("edit");

  let post_id = getPostId(event);
  let post = await getPostById(post_id);

  let saveBtn = modalEditEl.querySelector(".cwp-valid");
  console.log(saveBtn)
  let titleModalEl = modalEditEl.querySelector("h4");
  let titlePostEl = modalEditEl.querySelector("#title");
  let exercptPostEl = modalEditEl.querySelector("#exercpt");

  titleModalEl.textContent = "Edit Post";
  titlePostEl.value = post.title;
  exercptPostEl.value = post.exercpt;

  const delta = quill.clipboard.convert(post.content)

  quill.setContents(delta, 'silent')

  modalEditEl.classList.toggle("show");
}

const createPost = async () => {
  const thumbnailEl = document.getElementById("thumbnail");
  const formData = new FormData();
  formData.append('thumbnail', thumbnailEl.files[0]);
  formData.append('title', 'alicia');
  formData.append('token', token.value);
  formData.append('excerpt', 'intro');
  formData.append('alt', 'alternative text');
  formData.append('content', 'big text');

  try {
    let response = await fetch('/app/blog/posts', {
      method: 'POST',
      body: formData,
    });
    response = await response.json();
    closeModal();
    if(response.success) {
      const message = response.message;
      alertBox(message, 'success');
    } else {
      alertBox(response.message, 'warning');
    }
    setTimeout(() => {
      window.location.reload();
    }, 3000);
  } catch(error) {
    alertBox(error, 'Danger');
  }
};

const alertBox = (message, type) => {
  const alertDiv = document.createElement('div');
  alertDiv.className = `alert alert-${type} alert-dismissible d-flex align-items-center`;
  alertDiv.setAttribute('role', 'alert');
  let iconClass = '';
  if(type === 'success') {
    iconClass = 'fa-circle-check';
  } else if(type === 'danger') {
    iconClass = 'fa-skull-crossbones';
  } else if(type === 'warning') {
    iconClass = 'fa-triangle-exclamation';
  } else if(type === 'info') {
    iconClass = 'fa-circle-info';
  }
  alertDiv.innerHTML = `
        <span class="me-3"><i class="fa-solid ${iconClass}"></i></span>
        <span class="text-uppercase">${message}</span>
        <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="alert"></button>
      `;
  document.querySelector('.col').appendChild(alertDiv);
}


// Event Listener
cards.forEach((card) => {
  card.addEventListener("click", openReadModal);
});

closeModalBtns.forEach(closeModalBtn => {
  closeModalBtn.addEventListener("click", closeModal)
});

optionBtns.forEach(optionBtn => {
  optionBtn.addEventListener("click", openOption)
});

editOptionLinks.forEach(editOptionLink => {
  editOptionLink.addEventListener("click", openEditModal)
});

deleteOptionLinks.forEach(deleteOptionLink => {
  deleteOptionLink.addEventListener("click", openDeleteModal)
});

likeBtns.forEach((likeBtn) => {
  likeBtn.addEventListener("click", like);
});

addBtn.addEventListener('click', openCreateModal);

saveBtn.addEventListener("click", createPost);