function removeAlerts() {
  //remove all alerts
  $('.alert').remove();
}

function removeAlert(event) {
  //remove alert from particular inputs
  $(event.target).parents('.form-group').find('.alert').remove();
}

function showAlert(templateId,type,forElement,message){
  let template = $('#'+templateId).html().trim();
  let clone = $(template);
  $(clone).addClass('alert-' + type);
  $(clone).find('.alert-message').text(message);
  //$(forElement).parents('.form-group').append(clone);
  $('#'+forElement).append(clone);
}

function validateForm(form_elm) {
  //simple form validation
  let inputs = $(form_elm).find('input');
  //check each input after converting into an array
  Array.from(inputs).forEach((input) => {
    
  });
}
$(document).ready(
  () => {
    $('#register-form').on('change', (event) => { removeAlert(event); });
    $('#register-form').on('submit', (event) => {
      event.preventDefault();
      //validateForm(event.target);
      let username = $('input[name="account_name"]').val();
      let email = $('input[name="email"]').val();
      let password = $('input[name="password"]').val();
      let defineUser = $('input[name="role"]').val();//:checked
      let accesscode = $('input[name="accessCode"').val();
      let registerdata = { account_name: username, email: email, password: password, role: defineUser, accessCode: accesscode};
      console.log(registerdata);
      //add spinner to button
      let spinner = '<img class="spinner" src="/images/gallery.gif">';
      $('button[name="register-btn"]').append(spinner);
      $('button[name="register-btn"]').attr('disabled', '');
      $.ajax({
          url: '/ajax/register.ajax.php',
          method: 'post',
          dataType: 'json',
          data: registerdata
        })
        .done((response) => {
          console.log(response);
          //remove spinner from button
          $('button[name="register-btn"] img').remove();
          // remove all alerts
          $('.alert').remove();
          removeAlerts();
          if (response.success == false) {
            //check for errors in different fields
            if (response.errors.username) {
              showAlert('alert-template','warning','alert-username',response.errors.username);
            }
            if (response.errors.email) {
              showAlert('alert-template','warning','alert-email',response.errors.email);
            }
            if (response.errors.password) {
              showAlert('alert-template','warning','alert-password',response.errors.password);
            }
            if (response.errors.accesscode) {
              showAlert('alert-template','warning','alert-accesscode',response.errors.accesscode);
            }
          }
          else
          {
              //if registeration is successful
              showAlert('alert-template','success','alert-success','account registeration successful');
              
              $('#register-form').trigger('reset');
          }
          $('button[name="register-btn"]').removeAttr('disabled');
        });
    });
  }
);
