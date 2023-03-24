const username = document.querySelector(".username"); //Dom Node

const checkUsername = async (body) => {
  //   const res = await fetch(
  //     `./server/check_username.php?user=${user}&email=${email}`
  //   ); //CORS

  const res = await fetch(`./server/check_username.php`, {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: new URLSearchParams(body).toString(),
    //tự chuyển query string: name1=value&name2=value2
  });

  const data = await res.json();

  const error = document.querySelector(".error");
  if (data.status == "error") {
    error.innerText = `Username không hợp lệ`;
    error.classList.add("wraning");
  } else {
    error.innerText = `Username hợp lệ`;
    error.classList.add("success");
  }
};

username.addEventListener("change", (e) => {
  checkUsername({
    user: e.target.value,
  });
});
