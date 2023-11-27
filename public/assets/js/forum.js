"use strict";
console.log("forum");

const contentEl = document.getElementById("content");
const titleEl = document.getElementById("title");
const categoryEl = document.getElementById("category");
const commentEl = document.getElementById("comment");

let discussion_id = "";

const getAllComments = (discussion_id) => {
    let comments = fetchData(`/app/forum/discussions/${discussion_id}/comments`);
    return comments;
}

const clearData = () => {
    contentEl.value = "";
    titleEl.value = "";
}

const openReadModal = async (event) => {
    discussion_id = getId(event);
    let discussion = await getById(discussion_id, 'discussions', 'forum');
    let comments = await getAllComments(discussion_id);
    titleModalReadEl.textContent = discussion.title;
    const commentUlEl = document.getElementById("commentUl");
    comments.forEach(comment => {
        let commentLi = document.createElement('li');
        commentLi.textContent = comment['content'];
        commentUlEl.append(commentLi);
    });

    modalReadEl.classList.toggle("show");
};

const openEditModal = async (event) => {
    actionModalEditBtn.value = "update";
    event.stopImmediatePropagation();
    discussion_id = getId(event);
    const discussion = await getById(discussion_id, 'discussions', 'forum');
    const categories = await getCategories();
    categories.forEach((categories, key) => {
        if(categories["id"] == discussion.category_id) {
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
    titleModalEditEl.textContent = "Edit Discussion";
    titleEl.value = discussion.title;
    contentEl.value = discussion.content;
    modalEditEl.classList.toggle("show");
}

const openDeleteModal = (event) => {
    event.stopImmediatePropagation();
    discussion_id = getId(event);
    titleModalDeleteEl.textContent = "Delete Post";
    bodyModalDeleteEl.textContent =
        "Veuillez confirmer pour supprimer";
    modalDeleteEl.classList.toggle("show")
}

const openCreateModal = async (event) => {
    event.stopImmediatePropagation();
    actionModalEditBtn.value = "create";
    titleModalEditEl.textContent = "Create Discussion";
    const categories = await getCategories();
    categories.forEach((categories, key) => {
        categoryEl[key] = new Option(categories["name"], categories["id"]);
    });
    modalEditEl.classList.toggle("show");
};

// CRUD Discussion
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
    const url = `/app/forum/discussions/${discussion_id}/delete`;
    postData(url, option);
}

const updateData = () => {
    const data = {
        token: document.querySelector(".token").value,
        title: titleEl.value,
        content: contentEl.value,
        categoryId: categoryEl.value,
    };
    const option = {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    };
    const url = `/app/forum/discussions/${discussion_id}/update`;
    postData(url, option);
}

const getFormDiscussion = () => {
    let token = document.querySelector(".token");
    const title = titleEl.value;
    const content = contentEl.value;
    const categoryId = categoryEl.value;
    const formData = new FormData();
    formData.append("title", title);
    formData.append("token", token.value);
    formData.append("content", content);
    formData.append("categoryId", categoryId);
    return formData;
};
const getFormComment = () => {
    let token = document.querySelector(".token");
    const comment = commentEl.value;
    const formData = new FormData();
    formData.append("token", token.value);
    formData.append("comment", comment);
    return formData;
};

const createData = () => {
    const formData = getFormDiscussion();
    const url = `/app/forum/discussions`;
    const option = {
        method: "POST",
        body: formData,
    };
    postData(url, option);
}

const sendData = () => {
    const formData = getFormComment();
    const option = {
        method: "POST",
        body: formData,
    }
    const url = `/app/forum/discussions/${discussion_id}/create`
    postData(url, option)
}