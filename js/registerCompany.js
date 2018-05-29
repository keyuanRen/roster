
$(document).ready(
  () => {
    $('#register-company').on('change', (event) => {
      $(event.target).removeClass('was-validated');
      $('button[name="company-register-btn"]').removeAttr('disabled');
    });
    $('#register-company').on('submit', (event) => {
      event.preventDefault();
      $(event.target).addClass('was-validated');
      
      let companyName = $('input[name="companyName"]').val();
      let companyWebsite = $('input[name="companyWebsite"]').val();
      let unitNumber = $('input[name="unitNumber"]').val();
      let streetNumber = $('input[name="streetNumber"]').val();
      let streetName = $('input[name="streetName"]').val();
      let suburb = $('input[name="suburb"]').val();
      let postcode = $('input[name="postcode"]').val();
      let accessCode = $('input[name="accessCode"]').val();
      let registerdata = { companyName: companyName, companyWebsite: companyWebsite, unitNumber: unitNumber, 
      streetNumber: streetNumber, streetName: streetName,
      suburb: suburb, postcode: postcode, accessCode: accessCode};
      console.log(registerdata);
      //add spinner to button
      let spinner = '<img class="spinner" src="/images/gallery.gif">';
      $('button[name="company-register-btn"]').append(spinner);
      $('button[name="company-register-btn"]').attr('disabled', '');
      $.ajax({
          url: '/ajax/registercompany.ajax.php',
          method: 'post',
          dataType: 'json',
          data: registerdata
        })
        .done((response) => {
          console.log(response);
          //remove spinner from button
          $('button[name="company-register-btn"] img').remove();
          if (response.success == false) {
            
          }
          else
          {
            //redirect to account page
            let role = $('input[name="role"]').val();
            
            let url = 'registerManager.php?companyId='+response.companyId+'&role='+role+'&accessCode='+accessCode;
            console.log(url);
            window.location.href = url;
          }
          $('button[name="company-register-btn"]').removeAttr('disabled');
        });
    });
  }
);
