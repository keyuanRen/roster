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
      let companyName = $('input[name="companyName"]').val();
      let companyWebsite = $('input[name="companyWebsite"]').val();
      let unitNumber = $('input[name="unitNumber"]').val();
      let streetNumber = $('input[name="streetNumber"]').val();
      let suburb = $('input[name="suburb"]').val();
      let postcode = $('input[name="postcode"]').val();
      let accessCode = $('input[name="accessCode"]').val();
      let registerdata = { companyName: companyName, companyWebsite: companyWebsite, unitNumber: unitNumber, streetNumber: streetNumber, 
      suburb: suburb, postcode: postcode, accessCode: accessCode};
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
            if (response.errors.companyName) {
              showAlert('alert-template','warning','alert-companyName',response.errors.companyName);
            }
            if (response.errors.companyWebsite) {
              showAlert('alert-template','warning','alert-companyWebsite',response.errors.companyWebsite);
            }
            if (response.errors.unitNumber) {
              showAlert('alert-template','warning','alert-unitNumber',response.errors.unitNumber);
            }
            if (response.errors.streetNumber) {
              showAlert('alert-template','warning','alert-streetNumber',response.errors.streetNumber);
            }
            if (response.errors.suburb) {
              showAlert('alert-template','warning','alert-suburb',response.errors.suburb);
            }
            if (response.errors.postcode) {
              showAlert('alert-template','warning','alert-postcode',response.errors.postcode);
            }
            if (response.errors.accessCode) {
              showAlert('alert-template','warning','alert-accessCode',response.errors.accessCode);
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
