"use strict";
console.log("forum");

const clearData = () => {

}


const openReadModal = async (event) => {
    let post_id = getPostId(event);
    let post = await getPostById(post_id);
    let contentModalEl = document.querySelector(".modal-body");
    let titleModalEl = document.querySelector(".modal-title");
    titleModalEl.textContent = post.title;
    contentModalEl.innerHTML = post.content;
    modalReadEl.classList.toggle("show");
};

const openEditModal = () => {

}

const openDeleteModal = (event) => {
    event.stopImmediatePropagation();
    let id = id.getId();
}