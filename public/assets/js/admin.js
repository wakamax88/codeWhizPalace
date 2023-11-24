"use strict";

console.log("test");
let modalDeleteEl = document.getElementById("modal-delete");
let editBtns = document.querySelectorAll(".cwp-edit-btn");
let deleteBtns = document.querySelectorAll(".cwp-delete-btn");
let closeModalBtns = document.querySelectorAll(".cwp-close-modal");
let actionYes = document.getElementById("actionYes");
let roleSelects = document.querySelectorAll(".role");
let pageLinks = document.querySelectorAll(".page");
let showEl = document.getElementById("show");
let account_id = "";

const alertBox = (message, type) => {
  const alertDiv = document.createElement("div");
  alertDiv.className = `alert alert-${type} alert-dismissible d-flex align-items-center`;
  alertDiv.setAttribute("role", "alert");
  let iconClass = "";
  if (type === "success") {
    iconClass = "fa-circle-check";
  } else if (type === "danger") {
    iconClass = "fa-skull-crossbones";
  } else if (type === "warning") {
    iconClass = "fa-triangle-exclamation";
  } else if (type === "info") {
    iconClass = "fa-circle-info";
  }
  alertDiv.innerHTML = `
          <span class="me-3"><i class="fa-solid ${iconClass}"></i></span>
          <span class="text-uppercase">${message}</span>
          <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="alert"></button>
        `;
  document.querySelector(".col").appendChild(alertDiv);
};
const getAccountId = (event) => {
  console.log(event.currentTarget);
  let trEl = event.currentTarget.closest("tr");
  return trEl.id;
};

const closeModal = () => {
  modalDeleteEl.classList.remove("show");
  //modalEditEl.classList.remove("show");
  //modalReadEl.classList.remove("show");
};

const openDeleteModal = (event) => {
  event.stopImmediatePropagation();
  account_id = getAccountId(event);
  console.log(account_id);

  actionYes.addEventListener("click", async (event) => {
    const data = {
      token: document.querySelector(".token").value,
    };
    try {
      let response = await fetch(`/app/admin/users/delete/${account_id}`, {
        method: "DELETE",
        HEADERS: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      });
      closeModal();
      response = await response.json();
      if (response.success) {
        const message = response.message;
        alertBox(message, "success");
      } else {
        alertBox(message, "warning");
      }
      setTimeout(() => {
        window.location.reload();
      }, 3000);
    } catch (error) {
      alertBox(error, "danger");
    }
  });

  modalDeleteEl.classList.toggle("show");
};

const updateRole = async (event) => {
  account_id = event.target.id;
  const data = {
    token: document.querySelector(".token").value,
    role: event.target.value,
  };
  try {
    let response = await fetch(`/app/admin/users/${account_id}/update`, {
      method: "PATCH",
      HEADERS: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    });
    response = await response.json();
    let message = response.message;
    if (response.success) {
      alertBox(message, "success");
    } else {
      alertBox(message, "warning");
    }
    setTimeout(() => {
      window.location.reload();
    }, 3000);
  } catch (error) {
    alertBox(error, "danger");
  }
};
const setLink = (event) => {
  pageLinks.forEach(async (pageLink) => {
    let show = showEl.value;
    let pathname = pageLink.pathname;
    let page = pageLink.search;
    let query = `${page}&show=${show}`;
    let url = `${pathname}${query}`;
    pageLink.setAttribute("href", url);
    url = pageLink.href;
    console.log(url);
    try {
      await fetch(url);
    } catch (error) {
      console.log("error");
    }
  });
  console.log(pageLinks);
};
// Event Listener

deleteBtns.forEach((deleteBtn) => {
  deleteBtn.addEventListener("click", openDeleteModal);
});
closeModalBtns.forEach((closeModalBtn) => {
  closeModalBtn.addEventListener("click", closeModal);
});
roleSelects.forEach((roleSelect) => {
  roleSelect.addEventListener("change", updateRole);
});

showEl.addEventListener("change", setLink);
