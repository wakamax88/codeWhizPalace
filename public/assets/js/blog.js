"use strict";

let likeBtns = document.querySelectorAll(".like");
let cards = document.querySelectorAll(".card");
let modalReadEl = document.getElementById('modal-read');
let closeModalBtns = document.querySelectorAll('.cwp-close-modal');
let actionYes = document.getElementById("actionYes")
let optionBtns = document.querySelectorAll(".cwp-option-btn");
let editOptionLinks = document.querySelectorAll(".cwp-edit-option-link");
let deleteOptionLinks = document.querySelectorAll(".cwp-delete-option-link");

let modalDeleteEl = document.getElementById("modal-delete");
let modalEditEl = document.getElementById("modal-edit");

let addBtn = document.getElementById("add");
let actionBtn = document.getElementById("action");
let pageLinks = document.querySelectorAll(".page");
let showEl = document.getElementById("show");
let contentSendEl = document.querySelector('#content')
let titleEl = document.querySelector("#title");
let thumbnailEl = document.querySelector('#thumbnail');
let altEl = document.querySelector("#alt");
let exercptEl = document.querySelector('#exercpt');
let categoryEl = document.getElementById('category');
let titleModalEditEl = document.querySelector("#titleModalEdit");
let titleModalDeleteEl = document.getElementById('titleModalDelete');
let post_id = '';
var options = {
  debug: 'info',
  placeholder: 'Compose an epic...',
  readOnly: false,
  theme: 'snow'
};
const quill = new Quill('#contentVisual', options);

quill.on("text-change", function () {
  contentSendEl.value = quill.root.innerHTML;
});

const getPostId = (event) => {
  let cardEl = event.currentTarget.closest(".card");
  return cardEl.id;
}

const like = (event) => {
  event.stopImmediatePropagation();
  console.log("like");
  let post_id = getPostId(event);

};

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

const openReadModal = async (event) => {
  let post_id = getPostId(event);
  let post = await getPostById(post_id);

  let contentModalEl = modalReadEl.querySelector(".modal-body");
  let exercptModalEl = modalReadEl.querySelector("exercpt");

  contentModalEl.innerHTML = post.text;

  modalReadEl.classList.toggle("show");

};

const closeModal = () => {
  titleEl.value = '';
  alt.value = '';
  contentSendEl.value = '';
  exercptEl.value = '';
  quill.setText('');
  modalReadEl.classList.remove("show");
  modalDeleteEl.classList.remove("show");
  modalEditEl.classList.remove("show");
}

const openOption = (event) => {
  event.stopImmediatePropagation();
}

const openDeleteModal = (event) => {
  event.stopImmediatePropagation();
  post_id = getPostId(event);
  titleModalDeleteEl.textContent = "Delete Post";
  actionYes.addEventListener('click', async () => {
    const data = {
      token: document.querySelector(".token").value,
    }
    try {
      let response = await fetch(`/app/blog/posts/delete/${post_id}`, {
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      });
      response = await response.json();
      closeModal();
      if(response.success) {
        const message = response.message;
        alertBox(message, 'success');
      } else {
        alertBox(message, 'warning');
      }
      setTimeout(() => {
        window.location.reload();
      }, 3000);
    } catch(error) {
      alertBox(error, 'danger');
    }
  });
  modalDeleteEl.classList.toggle("show");
}

const openCreateModal = async (event) => {
  event.stopImmediatePropagation();
  actionBtn.value = 'save';
  actionBtn.textContent = 'Save';
  titleModalEditEl.textContent = "Create Post";

  let categories = await getCategories();

  categories.forEach((categories, key) => {
    categoryEl[key] = new Option(categories['name'], categories['id']);
  });

  actionBtn.addEventListener('click', async () => {
    let formData = getFormPost();
    try {
      let response = await fetch(`/app/blog/posts`, {
        method: 'POST',
        body: formData,
      });
      response = await response.json();
      closeModal();
      if(response.success) {
        const message = response.message;
        alertBox(message, 'success');
      } else {
        alertBox(message, 'warning');
      }
      setTimeout(() => {
        window.location.reload();
      }, 3000);
    } catch(error) {
      alertBox(error, 'danger');
    }
  });
  modalEditEl.classList.toggle("show");
}

const openEditModal = async (event) => {
  event.stopImmediatePropagation();
  actionBtn.value = 'update';
  actionBtn.textContent = 'Update';
  titleModalEditEl.textContent = "Edit Post";

  post_id = getPostId(event);

  let post = await getPostById(post_id);
  let categories = await getCategories();

  categories.forEach((categories, key) => {
    if(categories['id'] == post.category_id) {
      categoryEl[key] = new Option(categories['name'], categories['id'], true, true);
    } else {
      categoryEl[key] = new Option(categories['name'], categories['id']);
    }
  });
  titleEl.value = post.title;
  exercptEl.value = post.excerpt;
  content.value = post.content;
  altEl.value = post.alt;

  const delta = quill.clipboard.convert(post.content)
  quill.setContents(delta, 'silent')

  actionBtn.addEventListener('click', async () => {
    const data = {
      token: document.querySelector(".token").value,
      title: titleEl.value,
      alt: altEl.value,
      content: contentSendEl.value,
      excerpt: exercptEl.value,
      categoryId: categoryEl.value,
    }
    try {
      let response = await fetch(`/app/blog/posts/update/${post_id}`, {
        method: 'PATCH',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      });
      response = await response.json();
      closeModal();
      if(response.success) {
        alertBox(response.message, 'success');
      } else {
        alertBox(response.message, 'warning');
      }
      setTimeout(() => {
        window.location.reload();
      }, 3000);
    } catch(error) {
      console.log(error);
      alertBox(error, 'danger');
    }
  })

  modalEditEl.classList.toggle("show");
}
const getFormPost = () => {
  let token = document.querySelector(".token");
  let title = titleEl.value;
  let alt = altEl.value;
  let thumbnail = thumbnailEl.files[0]
  let content = contentSendEl.value;
  let excerpt = exercptEl.value;
  let categoryId = categoryEl.value;
  const formData = new FormData();
  formData.append('thumbnail', thumbnail);
  formData.append('title', title);
  formData.append('token', token.value);
  formData.append('excerpt', excerpt);
  formData.append('alt', alt);
  formData.append('content', content);
  formData.append('categoryId', categoryId);
  console.log(formData);
  return formData;
}

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

const setLink = (event) => {
  pageLinks.forEach(pageLink => {
    let show = showEl.value;
    let pathname = pageLink.pathname;
    let page = pageLink.search;
    let query = `${page}&show=${show}`
    let url = `${pathname}${query}`;
    pageLink.setAttribute('href', url);
  });
  console.log(pageLinks)
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

showEl.addEventListener("change", setLink)