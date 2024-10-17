const btn_edit = document.getElementById("btn_edit");
const inputs = document.querySelectorAll(".form-control");
const btn_submit = document.getElementById("submit_btn");
const img_field = document.getElementById("upload_img");

btn_edit.addEventListener("click", function (e) {
  console.log("test");

  inputs.forEach(function (input) {
    input.removeAttribute("disabled");
  });

  delete_btn.style.display = "none";
  btn_edit.style.display = "none";
  btn_submit.style.display = "";
});
