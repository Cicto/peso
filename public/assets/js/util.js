/**
 * It's a wrapper for the jQuery AJAX function that allows you to pass in an object with the AJAX
 * parameters and it will return a promise.
 * </code>
 * @param ajaxObj - {
 *  method - The HTTP method,
 *  url - The API url,
 *  data - Object data,
 *  loader - If apply a loading overlay,
 *  successAlert - Success alert popup,
 *  warningAlert - Warning alert popup,
 *  success - Success callback function,
 *  error - Error callback function
 *  }
 * @returns The return value of the AJAX function is the return value of the $.ajax() function.
 */
async function AJAX(ajaxObj) {
  if (ajaxObj.hasOwnProperty("method")) {
    const method = ajaxObj.method.toUpperCase();
    let data = {};
    let response = null;
    let url = ajaxObj.url;
    if (ajaxObj.hasOwnProperty("data")) {
      data = ajaxObj.data;
      if (Array.isArray(data)) {
        if (data.length > 0) {
          data = {};
          $(ajaxObj.data).each(function (index, obj) {
            data[obj.name] = obj.value;
          });
        } else {
          data = {};
        }
      }
    }

    let has_loader = true;
    if (
      ajaxObj.hasOwnProperty("loader") &&
      typeof ajaxObj.loader == "boolean"
    ) {
      has_loader = ajaxObj.loader;
    }
    let succAlert = false;
    if (
      ajaxObj.hasOwnProperty("successAlert") &&
      (typeof ajaxObj.successAlert == "boolean" ||
        typeof ajaxObj.successAlert == "object")
    ) {
      succAlert = ajaxObj.successAlert;
    }
    let warnAlert = false;
    if (
      ajaxObj.hasOwnProperty("warningAlert") &&
      (typeof ajaxObj.warningAlert == "boolean" ||
        typeof ajaxObj.warningAlert == "object")
    ) {
      warnAlert = ajaxObj.warningAlert;
    }
    let succCallback = false;
    if (
      ajaxObj.hasOwnProperty("success") &&
      typeof ajaxObj.success == "function"
    ) {
      succCallback = ajaxObj.success;
    }
    let warnCallback = false;
    if (ajaxObj.hasOwnProperty("error") && typeof ajaxObj.error == "function") {
      warnCallback = ajaxObj.error;
    }

    if (checkMethod(method)) {
      await $.ajax({
        type: method,
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        },
        url: url,
        data: data,
        timeout: 800000,
        beforeSend: function (xhr) {
          loading(has_loader);
        },
        success: function (data) {
          loading(false);
          console.log(data);
          if (isJsonString(data)) {
            const data_json = JSON.parse(data);

            if (data_json.status == 1) {
              if (succAlert) {
                if (
                  !(
                    succAlert.hasOwnProperty("header") &&
                    succAlert.hasOwnProperty("body")
                  )
                ) {
                  if (succAlert) {
                    successAlert("Success!", data_json.result);
                  } else {
                    console.error(
                      "Missing success alert property \n Success:" +
                        JSON.stringify(succAlert)
                    );
                    throw new Error(
                      SyntaxError,
                      `Missing success alert property.`
                    );
                  }
                } else {
                  successAlert(succAlert.header, succAlert.body);
                }
              }
            } else if (data_json.hasOwnProperty("error")) {
              if (warnAlert) {
                if (
                  !(
                    warnAlert.hasOwnProperty("header") &&
                    warnAlert.hasOwnProperty("body")
                  )
                ) {
                  if (warnAlert) {
                    warningAlert("Error", data_json.result);
                  } else {
                    console.error(
                      "Missing warning alert property \n warning:" +
                        JSON.stringify(succAlert)
                    );
                    throw new Error(
                      SyntaxError,
                      `Missing success alert property.`
                    );
                  }
                } else {
                  warningAlert(warnAlert.header, warnAlert.body);
                }
              }
            }
          } else {
            if (succAlert) {
              if (
                !(
                  succAlert.hasOwnProperty("header") &&
                  succAlert.hasOwnProperty("body")
                )
              ) {
                if (succAlert) {
                  successAlert();
                } else {
                  console.error(
                    "Missing success alert property \n Success:" +
                      JSON.stringify(succAlert)
                  );
                  throw new Error(
                    SyntaxError,
                    `Missing success alert property.`
                  );
                }
              } else {
                successAlert(succAlert.header, succAlert.body);
              }
            }
          }
          if (succCallback) {
            succCallback(data);
          }
          response = data;
          return data;
        },
        error: function (error) {
          loading(false);
          if (warnAlert) {
            if (
              !(
                warnAlert.hasOwnProperty("header") &&
                warnAlert.hasOwnProperty("body")
              )
            ) {
              if (warnAlert) {
                warningAlert();
              } else {
                console.error(
                  "Missing warning alert property \n Success:" + warnAlert
                );
                throw new Error(SyntaxError, `Missing warning alert property.`);
              }
            } else {
              warningAlert(warnAlert.header, warnAlert.body);
            }
          }
          if (warnCallback) {
            warnCallback(error);
          }
          console.error(error);
          return error;
        },
      });

      return response;
    } else {
      console.error("Invalid method on: " + url);
      throw new Error(SyntaxError, `Invalid method ${method}`);
    }
  }
}

/**
 * It takes a file and returns a promise that resolves to the base64 representation of the file
 */
const toBase64 = (file, max_size = 5) =>
  new Promise((resolve, reject) => {
    if (file.size / 1024 ** 2 <= max_size) {
      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = () => resolve(reader.result);
      reader.onerror = (error) => reject(error);
    } else {
      return false;
    }
  });

/**
 * It checks if the method is one of the four HTTP methods (GET, POST, PUT, DELETE) and returns true if
 * it is, and false if it isn't.
 * @param method - The HTTP method to use.
 * @returns A boolean value.
 */
function checkMethod(method) {
  method = method.toUpperCase();
  switch (method) {
    case "GET":
      return true;
      break;
    case "POST":
      return true;
      break;
    case "PUT":
      return true;
      break;
    case "DELETE":
      return true;
      break;
    default:
      return false;
      break;
  }
}

/**
 * If the page loader is visible, hide it. If it's not visible, show it.
 * @param is_visible - true or false
 * @returns The value of the is_visible parameter.
 */
function loading(is_visible) {
  $("#page-loader").toggle(is_visible);
  return is_visible;
}

/**
 * It creates a modal with the header and body specified in the function call
 * @param [header=Success!] - The header of the modal.
 * @param [body=Operation successfully completed!] - The body of the alert.
 */
function successAlert(
  header = "Success!",
  body = "Operation successfully completed!"
) {
  // const modal = bootstrap.Modal.getOrCreateInstance('#successAlert');
  const modal = new bootstrap.Modal("#successAlert", {
    backdrop: false,
  });
  $("#successAlert h5").html(header);
  $("#successAlert p").html(body);
  modal.show();
}

/**
 * It takes two arguments, a header and a body, and displays them in a warning modal.
 * @param [header=Error] - The header of the modal
 * @param [body=Something went wrong] - The body of the alert.
 */
function warningAlert(header = "Error", body = "Something went wrong") {
  // const modal = bootstrap.Modal.getOrCreateInstance('#warningAlert');
  const modal = new bootstrap.Modal("#warningAlert", {
    backdrop: false,
  });
  $("#warningAlert h5").html(header);
  $("#warningAlert p").html(body);
  modal.show();
}

/**
 * It creates a modal with a header and body, and if the user clicks the yes button, it will run the
 * function passed to the function.
 * @param [yes_callback=false] - The function to be called when the user clicks the "Yes" button.
 * @param [header=Notice!] - The header of the modal
 * @param [body=Are you sure you want to continue?] - The body of the modal
 */
let confirmationModal_callback_function;
function askConfirmation(
  yes_callback = false,
  header = "Notice!",
  body = "Are you sure you want to continue?"
) {
  // const modal = bootstrap.Modal.getOrCreateInstance('#warningAlert');
  const modal = new bootstrap.Modal("#confirmationModal", {
    backdrop: false,
  });
  $("#confirmationModal h5").html(header);
  $("#confirmationModal p").html(body);
  confirmationModal_callback_function = yes_callback;
  modal.show();
}

/**
 * If the string is valid JSON, it will return true, otherwise it will return false.
 * @param str - The string to be checked
 * @returns A boolean value.
 */
function isJsonString(str) {
  try {
    JSON.parse(str);
  } catch (e) {
    return false;
  }
  return true;
}

/**
 * It checks if the given string is a valid email address.
 * @param email - The email address to validate.
 * @returns A boolean value.
 */
function validateEmail(email) {
  return String(email)
    .toLowerCase()
    .match(
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
}

/**
 * It takes a number and returns the month name
 * @param val - The value of the month you want to convert.
 * @param [bool=false] - If true, it will return the month name of the previous month.
 * @returns A function that takes two parameters, val and bool.
 */
function toMonth(val, bool = false) {
  if (val > 0) {
    if ((bool == false && val <= 11) || (bool == true && val <= 12)) {
      var months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
      ];
      if (bool) {
        val = -1;
      }
      return months[val];
    } else {
      return new Error("Invalid values given");
    }
  } else {
    return new Error("Invalid values given");
  }
}

/**
 * It takes a string in the format of a MySQL date (YYYY-MM-DD) and returns a string in the format of a
 * human readable date (Month DD, YYYY).
 * @param str - The string that you want to convert.
 * @returns A string in the format of "Month day, year"
 */
function mySQLDateToText(str) {
  str = str.split(" ")[0];
  const month = toMonth(Number(str.split("-")[1] - 1));
  const day = str.split("-")[2];
  const year = str.split("-")[0];
  return `${month} ${day}, ${year}`;
}

/**
 * If the hour is greater than 12, subtract 12 from the hour and add 'pm' to the end of the string,
 * otherwise add 'am' to the end of the string.
 * @param str - The time in mySQL format (HH:MM:SS)
 */
function mySQLTimeToText(str) {
  let hour = Number(str.split(":")[0]);
  let minute = Number(str.split(":")[1]);

  let meridiem = hour >= 12 ? "pm" : "am";
  if (hour > 12) {
    hour -= 12;
  }
  hour = hour < 10 ? `0${hour}` : hour;
  minute = minute < 10 ? `0${minute}` : minute;

  return `${hour}:${minute} ${meridiem}`;
}

function mySQLDateTimeToText(str) {
  return `${mySQLDateToText(str.split(" ")[0])} ${mySQLTimeToText(
    str.split(" ")[1]
  )}`;
}

/**
 * If the month and day of the current date is less than the month and day of the birthdate, then
 * subtract one from the age.
 * @param dateString - The date string to be parsed.
 * @returns The age of the person.
 */
function getAge(dateString) {
  var today = new Date();
  var birthDate = new Date(dateString);
  var age = today.getFullYear() - birthDate.getFullYear();
  var m = today.getMonth() - birthDate.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
    age--;
  }
  return age;
}

/**
 * It returns the first item in an array that has a property with a value equal to the id you pass in.
 * @param array - the array you want to search
 * @param id - the id of the item you want to find
 * @param id_name - the name of the id in the array
 * @returns The first element in the array that matches the condition.
 */
function searchArrayById(array, id, id_name = "id") {
  return array.find((array_item) => array_item[id_name] == id);
}

/**
 * It takes a form selector as an argument and resets the form.
 * @param form_selector - The selector of the form you want to reset.
 */
function resetForm(form_selector) {
  document.querySelector(form_selector).reset();
}

/**
 * It takes a string, creates a new DOMParser, parses the string as HTML, and returns the text content
 * of the document element
 * @param input - The string to decode.
 * @returns The string "&lt;p&gt;Hello World&lt;/p&gt;"
 */
function htmlDecode(input) {
  var doc = new DOMParser().parseFromString(input, "text/html");
  return doc.documentElement.textContent;
}

/**
 * It reloads the dataTable with the new url if the url is provided, otherwise it reloads the dataTable
 * with the same url.
 * @param dataTable - The DataTable object
 * @param [url=false] - The URL to send the AJAX request to.
 */
function reloadDataTable(dataTable, url = false) {
  if (url) {
    dataTable.ajax.url(url).load();
  } else {
    dataTable.ajax.reload();
  }
}

/**
 *  It's a function that capitalizes the first letter of every word in a string. */
String.prototype.ucwords = function () {
  str = this.toLowerCase();
  return str.replace(/(^([a-zA-Z\p{M}]))|([ -][a-zA-Z\p{M}])/g, function (s) {
    return s.toUpperCase();
  });
};

jQuery(function () {
  $("#warningAlert, #successAlert").on("click", function () {
    bootstrap.Modal.getOrCreateInstance("#" + $(this).attr("id")).hide();
  });

  $("#warningAlert")[0].addEventListener("hidden.bs.modal", (event) => {
    $("body").css("overflow", "auto");
  });

  $("#confirmationModal_yes").on("click", function () {
    if (typeof confirmationModal_callback_function === "function") {
      confirmationModal_callback_function();
    }
  });
});

/**
 * The function toggles the visibility of a password field in a web form.
 * @param [bool=true] - A boolean value that determines whether the password should be visible or
 * hidden. If it is set to true, the password will be visible, and if it is set to false, the password
 * will be hidden.
 * @param target_element - The target_element parameter is the HTML element whose password visibility
 * is being toggled. It could be an input element of type "password" or any other element that has a
 * "type" attribute that can be set to "text" or "password".
 */
function viewPassword(bool = true, target_element) {
  if (bool) {
    target_element.setAttribute("type", "text");
  } else {
    target_element.setAttribute("type", "password");
  }
}

function serializeObject(form_id) {
  const form_data = {};
  $(form_id)
    .serializeArray()
    .forEach((field) => {
      form_data[field.name] = field.value;
    });
  return form_data;
}
