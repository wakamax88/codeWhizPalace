"use strict";
const optionBtns = document.querySelectorAll(".cwp-option-btn");
const closeModalBtns = document.querySelectorAll(".cwp-close-modal");
const addBtns = document.querySelectorAll(".cwp-add");
const editOptionLinks = document.querySelectorAll('.cwp-edit-option-link');
const deleteOptionLinks = document.querySelectorAll(".cwp-delete-option-link");

const pageLinks = document.querySelectorAll(".page");
const showEl = document.getElementById("show");

const commentBtns = document.querySelectorAll(".cwp-comment");

/*  Modal Read */
const modalReadEl = document.getElementById("modal-read");
const titleModalReadEl = document.querySelector("#modal-read .modal-title");
const actionModalReadBtn = document.querySelector("#modal-read .cwp-action");
const bodyModalReadEl = document.querySelector("#modal-read .modal-body");
/* Modal Delete */
const modalDeleteEl = document.getElementById("modal-delete");
const titleModalDeleteEl = document.querySelector("#modal-delete .modal-title");
const bodyModalDeleteEl = document.querySelector("#modal-delete .modal-body");
const actionModalDeleteBtn = document.querySelector("#modal-delete .cwp-action");
/* Modal Edit */
const modalEditEl = document.getElementById("modal-edit");
const titleModalEditEl = document.querySelector("#modal-edit .modal-title");
const bodyModalEditEl = document.querySelector("#modal-edit .modal-body");
const actionModalEditBtn = document.querySelector("#modal-edit .cwp-action");

// Function Commun
const toCamelCase = (inputString) => {
    let words = inputString.split(" ");
    console.log(words);
    for(let i = 0; i < words.length; i++) {
        words[i] = words[i].charAt(0).toLowerCase() + words[i].slice(1);
        if(i > 0) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
        }
    }
    let camelCaseString = words.join("");
    return camelCaseString;
}
const alertBox = (message, type) => {
    const alertDiv = document.createElement("div");
    alertDiv.className = `alert alert-${type} alert-dismissible d-flex align-items-center`;
    alertDiv.setAttribute("role", "alert");
    let iconClass = "";
    if(type === "success") {
        iconClass = "fa-circle-check";
    } else if(type === "danger") {
        iconClass = "fa-skull-crossbones";
    } else if(type === "warning") {
        iconClass = "fa-triangle-exclamation";
    } else if(type === "info") {
        iconClass = "fa-circle-info";
    }
    alertDiv.innerHTML = `
          <span class="me-3"><i class="fa-solid ${iconClass}"></i></span>
          <span class="text-uppercase">${message}</span>
          <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="alert"></button>
        `;
    document.querySelector(".col").appendChild(alertDiv);
};

// Function Commun
const getCategories = () => {
    let categories = fetchData(`/app/common/categories`);
    return categories;
};

const getId = (event) => {
    let cardEl = event.currentTarget.closest(".card");
    return cardEl.id;
};

const getById = (id, table, controller) => {
    let url = `/app/${controller}/${table}/${id}`;
    let data = fetchData(url);
    return data;
};

//Fetch
const fetchData = async (url, option = {}) => {
    try {
        const response = await fetch(url, option)
        if(!response.ok) {
            throw new Error('Error Server')
        }
        const data = await response.json();
        return data;
    } catch(error) {
        alertBox(error, "danger");
    }
}
const postData = async (url, option) => {
    try {
        let response = await fetch(url, option)
        if(!response.ok) {
            throw new Error('Error Server')
        }
        response = await response.json();
        closeModal();
        if(response.success) {
            alertBox(response.message, "success");
        } else {
            alertBox(response.message, "warning");
        }
        setTimeout(() => {
            window.location.reload();
        }, 3000);
    } catch(error) {
        alertBox(error, "danger");
    }
}
//Fetch

// Modal
const closeModal = () => {
    clearData();
    modalReadEl.classList.remove("show");
    modalDeleteEl.classList.remove("show");
    modalEditEl.classList.remove("show");
};

closeModalBtns.forEach((closeModalBtn) => {
    closeModalBtn.addEventListener("click", closeModal);
});

addBtns.forEach(addBtn => {
    addBtn.addEventListener('click', openCreateModal)
});

editOptionLinks.forEach((editOptionLink) => {
    editOptionLink.addEventListener("click", openEditModal);
});

deleteOptionLinks.forEach((deleteOptionLink) => {
    deleteOptionLink.addEventListener("click", openDeleteModal);
});

commentBtns.forEach(commentBtn => {
    commentBtn.addEventListener('click', openReadModal)
});
// Modal

// Option Menu
const openOption = (event) => {
    event.stopImmediatePropagation();
};

optionBtns.forEach((optionBtn) => {
    optionBtn.addEventListener("click", openOption);
});
// Option Menu

// Pagination
const setLink = (event) => {
    pageLinks.forEach((pageLink) => {
        let show = showEl.value;
        let pathname = pageLink.pathname;
        let page = pageLink.search;
        let query = `${page}&show=${show}`;
        let url = `${pathname}${query}`;
        pageLink.setAttribute("href", url);
    });
    console.log(pageLinks);
};
showEl.addEventListener("change", setLink);
//Pagination

actionModalDeleteBtn.addEventListener('click', deleteData);
actionModalEditBtn.addEventListener('click', (event) => {
    if(actionModalEditBtn.value == "update") {
        updateData();
    } else if(actionModalEditBtn.value == "create") {
        createData();
    }
});

actionModalReadBtn.addEventListener('click', sendData);