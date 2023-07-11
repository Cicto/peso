var pathname = window.location.pathname.split("/");
var url =
  window.location.origin +
  "/" +
  pathname[1] +
  "/" +
  pathname[2] +
  "/" +
  pathname[3];
var baseUrl = window.location.origin;

const profile_modal = $("#my-profile-modal").length
  ? bootstrap.Modal.getOrCreateInstance(
      document.querySelector("#my-profile-modal")
    )
  : null;
const cropper_modal = $("#my-profile-photo-crop-modal").length
  ? bootstrap.Modal.getOrCreateInstance(
      document.querySelector("#my-profile-photo-crop-modal")
    )
  : null;
const password_modal = $("#change-password-modal").length
  ? bootstrap.Modal.getOrCreateInstance(
      document.querySelector("#change-password-modal")
    )
  : null;
let cropper;

let is_authenticated = false;
if ($("#user-photo").length) {
  document.querySelector("#user-photo").addEventListener("change", function () {
    profile_modal.hide();
    const image = document.querySelector("#my-profile-photo-crop-image");
    const [file] = this.files;
    if (file) {
      image.src = URL.createObjectURL(file);
    }

    cropper = new Cropper(image, {
      aspectRatio: 1 / 1,
      dragMode: "move",
      viewMode: 1,
      background: false,
      minContainerWidth: 450,
      minContainerHeight: 420,
      cropBoxMovable: false,
      cropBoxResizable: false,
    });
    cropper.reset();
    cropper_modal.show();
  });
}

if ($("#my-profile-photo-crop-modal").length) {
  document
    .querySelector("#my-profile-photo-crop-modal")
    .addEventListener("hidden.bs.modal", (event) => {
      if (cropper) {
        cropper.destroy();
      }
    });
}

$("#my-profile-photo-crop-modal #crop-button").click(function () {
  const cropped_image = cropper.getCroppedCanvas().toDataURL("image/jpeg");
  loading(true);
  $.ajax({
    type: "POST",
    url: base_url + "/UtilController/uploadUserAvatar/" + user_id,
    data: { dataURL: cropped_image },
    success: (data) => {
      if (!data) {
        alert("Something went wrong");
        loading(false);
      } else {
        $.post(base_url + "/users/updateUserPhoto/" + user_id + "/" + data)
          .done(function () {
            $.post(base_url + "/UtilController/moveUserAvatar/" + data)
              .done(function () {
                $(".user-avatar")
                  .attr(
                    "src",
                    base_url + "/public/assets/media/avatars/" + data
                  )
                  .attr("data-photo-name", data);
                loading(false);
                cropper_modal.hide();
                location.reload(true);
              })
              .fail(function () {
                alert("Something went wrong");
                loading(false);
              });
          })
          .fail(function () {
            alert("Something went wrong");
            loading(false);
          });
      }
    },
  });
});

$("#my-profile-form").submit(async function (e) {
  e.preventDefault();
  await updateUserOwnAccount(this);
  //   setTimeout(() => {
  //     location.reload();
  //   }, 500);
});

$(".password-toggle").click(function () {
  const password_field = $(this).parent().find(`.password-target`);
  if (password_field.attr("type") == "password") {
    password_field.attr("type", "text");
    $(this).find("i").addClass("ri-eye-line").removeClass("ri-eye-off-line");
  } else {
    password_field.attr("type", "password");
    $(this).find("i").removeClass("ri-eye-line").addClass("ri-eye-off-line");
  }
});

$(".change-password-submit").click(function () {
  const change_password_error_handler = $("#change-password-error");
  change_password_error_handler.hide();
  const current_password = $("#current-password").val();
  if (!is_authenticated) {
    $.post(base_url + "/users/authenticateUser", { password: current_password })
      .done(function (data) {
        console.log(data);
        is_authenticated = data ? true : false;
        if (data) {
          $(".current-password-container").slideUp(
            "fast",
            "linear",
            function () {
              $(".new-password-container").slideDown();
            }
          );
        } else {
          change_password_error_handler
            .css("display", "block")
            .html("<b>Authentication Error:</b> Password Incorrect");
        }
      })
      .fail(function (data) {
        change_password_error_handler
          .css("display", "block")
          .html("<b>Error:</b> Something went wrong");
        is_authenticated = false;
      });
  } else {
    console.log("now checking new password");
    const new_password = $("#new-password").val();
    const repeat_new_password = $("#repeat-new-password").val();
    if (new_password.length < 8) {
      change_password_error_handler
        .css("display", "block")
        .html("<b>Invalid Password:</b> Password must be atleast 8 characters");
    } else if (new_password !== repeat_new_password) {
      change_password_error_handler
        .css("display", "block")
        .html("<b>Invalid Password:</b> Passwords do not match");
    } else {
      $.post(base_url + "/users/updateAccountPassword/" + user_id, {
        new_password: new_password,
        confirm_new_password: repeat_new_password,
      })
        .done(function (data) {
          if (data) {
            password_modal.hide();
            Swal.fire({
              icon: "success",
              title: "Password Successfully Updated!",
              showConfirmButton: false,
              timer: 3000,
            });
          } else {
            change_password_error_handler
              .css("display", "block")
              .html("<b>Error:</b> Something went wrong");
          }
        })
        .fail(function (data) {
          change_password_error_handler
            .css("display", "block")
            .html("<b>Error:</b> Something went wrong");
        });
    }
    is_authenticated = false;
  }
});

if ($("#change-password-modal").length) {
  document
    .querySelector("#change-password-modal")
    .addEventListener("hidden.bs.modal", (event) => {
      is_authenticated = false;
      $(".current-password-container").show();
      $(".new-password-container").hide();
      $("#current-password").val("");
      $("#new-password").val("");
      $("#repeat-new-password").val("");
    });
}

let confirmApplication_callback_function = false;
function confirmApplication(job_id, callback_function = false) {
  const application_modal = bootstrap.Modal.getOrCreateInstance(
    document.querySelector("#jobApplicationModal")
  );
  AJAX({
    method: "GET",
    url: base_url + "/jobs/getJob/" + job_id,
    loader: false,
    success: function (data) {
      let job_id = 0;
      if (isJsonString(data)) {
        result = JSON.parse(data);
        if (result.status) {
          result = result.result[0];
          console.log(result);

          job_id = result.id;
          confirmApplication_callback_function = callback_function;
          $("#jobApplicationModal-job-category").html(`${result.job_category}`);
          $("#jobApplicationModal-job-title").html(`${result.job_title}`);
          $("#jobApplicationModal-company-name").html(`${result.company_name}`);
          $("#jobApplicationModal-company-address").html(
            `${result.company_address}`
          );
          application_modal.show();
        }
      }
      $("#jobApplicationModal_proceed").attr("data-job-id", job_id);
    },
  });
}

$("#jobApplicationModal_proceed").click(function () {
  const application_modal = bootstrap.Modal.getOrCreateInstance(
    document.querySelector("#jobApplicationModal")
  );
  const job_id = this.dataset.jobId;
  AJAX({
    method: "GET",
    url: base_url + "/jobs/createJobApplication/" + job_id,
    successAlert: true,
    warningAlert: true,
    success: function (data) {
      if (isJsonString(data)) {
        result = JSON.parse(data);
        if (result.status) {
          if (confirmApplication_callback_function) {
            confirmApplication_callback_function();
          }
          application_modal.hide();
        }
      }
    },
  });
});

async function updateUserOwnAccount(form_selector) {
  console.table($(form_selector).serializeArray());
  $.post(base_url + "/users/updateUserOwnAccount", $(form_selector).serialize())
    .done(function (data) {
      data = JSON.parse(data);

      if (!data.error) {
        $("#right-modal").modal("hide");
        Swal.fire({
          icon: "success",
          title: data.result,
          showConfirmButton: false,
          timer: 3000,
        });
      } else {
        Swal.fire({
          icon: "error",
          title: data.result,
          showConfirmButton: false,
          timer: 3000,
        });
      }
    })
    .fail(function (xhr, textStatus, errorThrown) {
      Swal.fire({
        icon: "error",
        title: "Request " + errorThrown,
        showConfirmButton: false,
        timer: 2000,
      });
    });
}
