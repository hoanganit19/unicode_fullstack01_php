/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

import { toSlug } from "./functions.js";

window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }

  const backs = document.querySelectorAll(".back");
  if (backs.length) {
    backs.forEach((back) => {
      back.addEventListener("click", (e) => {
        e.preventDefault();
        window.history.back();
      });
    });
  }

  const deleteActions = document.querySelectorAll(".delete-action");
  const deleteForm = document.querySelector(".delete-form");
  if (deleteActions.length && deleteForm !== null) {
    deleteActions.forEach((deleteItem) => {
      deleteItem.addEventListener("click", (e) => {
        e.preventDefault();

        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        }).then((result) => {
          if (result.isConfirmed) {
            const href = e.target.href;
            deleteForm.action = href;
            deleteForm.submit();
          }
        });
      });
    });
  }

  const checkItems = document.querySelectorAll(".check-item");
  const deletesForm = document.querySelector(".deletes-form");
  if (checkItems.length && deletesForm) {
    let count = 0;
    let ids = [];
    checkItems.forEach((item) => {
      item.addEventListener("change", (e) => {
        const status = e.target.checked;
        const id = parseInt(e.target.value);

        if (status) {
          count++;
          ids.push(id);
        } else {
          count--;
          ids = ids.filter((item) => item != id);
        }

        deletesForm.querySelector("button span").innerText = count;

        if (count > 0) {
          deletesForm.querySelector("button").classList.remove("disabled");
        } else {
          deletesForm.querySelector("button").classList.add("disabled");
        }

        deletesForm.querySelector("input").value = ids.join(",");
      });
    });

    deletesForm.addEventListener("submit", (e) => {
      e.preventDefault();
      if (confirm("Are you sure?")) {
        e.target.submit();
      }
    });
  }

  const titleEl = document.querySelector(".title");
  const slugEl = document.querySelector(".slug");
  let title, slug;
  if (titleEl && slugEl) {
    titleEl.addEventListener("change", (e) => {
      title = e.target.value;
      slug = toSlug(title);
      if (title.length && !slugEl.value.length) {
        slugEl.value = slug;
      }
    });

    slugEl.addEventListener("change", (e) => {
      if (!e.target.value) {
        e.target.value = slug;
      }
    });
  }

  const formEl = document.querySelectorAll("main form");

  if (formEl.length) {
    let check = false;
    formEl.forEach((form) => {
      if (
        !form.classList.contains("delete-form") &&
        !form.classList.contains("deletes-form")
      ) {
        check = true;
      }
    });

    if (check) {
      document.body.onbeforeunload = function () {
        return "Bạn có muốn chuyển?";
      };
    }
  }

  const ckfinderGroup = document.querySelectorAll(".ckfinder-group");
  if (ckfinderGroup.length) {
    ckfinderGroup.forEach((group) => {
      group.addEventListener("click", (e) => {
        if (e.target.classList.contains("choose-image")) {
          CKFinder.modal({
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function (finder) {
              const inputEl = group.querySelector(".ckfinder-image");
              const previewImage = group.querySelector(".ckfinder-preview");
              if (inputEl !== null) {
                finder.on("files:choose", function (evt) {
                  var file = evt.data.files.first();

                  inputEl.value = file.getUrl();

                  previewImage.innerHTML = `<img src="${file.getUrl()}" style="max-width: 100%"/>`;
                });

                finder.on("file:choose:resizedImage", function (evt) {
                  inputEl.value = evt.data.resizedUrl;
                  previewImage.innerHTML = `<img src="${evt.data.resizedUrl}" style="max-width: 100%"/>`;
                });
              }
            },
          });
        }
      });

      group.addEventListener("change", (e) => {
        if (!e.target.value) {
          const previewImage = group.querySelector(".ckfinder-preview");
          if (previewImage !== null) {
            previewImage.innerText = "";
          }
        }
      });
    });
  }
});
