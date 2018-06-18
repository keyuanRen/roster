$(document).ready( () => {
    //disable the form button
    // $('button[name="register-btn"]').attr('disabled','true');
    //add a listener to form
    $('#manager-register-form').submit( (event) => {
       event.preventDefault();
       //$(event.target).addClass('was-validated');
       //get values
       let username = $('input[name="account_name"]').val();
       let email = $('input[name="email"]').val();
       let password = $('input[name="password"]').val();
       let roleId = $('input[name="roleId"]').val();
       let companyId = $('input[name="companyId"]').val();
       
       //simply validate the form data
       let validation = {};
       //validate username
       (username.length >= 6 && username.length < 16) ? validation.username = true : validation.username = false;
       //validate email
       (email.length > 0 && email.indexOf('@') > 0 ) ? validation.email = true : validation.email = false;
       //validate password
       (password.length >= 8) ? validation.password = true : validation.password = false;
       //validate roleId
       (parseInt(roleId) > 0) ? validation.roleId = true : validation.roleId = false;
       //validate companyId
       (parseInt(companyId) > 0) ? validation.companyId = true : validation.companyId = false;
       
       //if all validation is true
       if( validation.username && 
           validation.email && 
           validation.password && 
           validation.roleId && 
           validation.companyId 
        ){
           //create data
            let managerData = {account_name: username, email: email, password: password, roleId: roleId, companyId: companyId };
            console.log(managerData);
            //send data to server
            $.ajax({
              url: '/ajax/registermanager.ajax.php',
              method: 'post',
              dataType: 'json',
              data: managerData
            })
            .done( (response) => {
                console.log( response );
                if( response.success == true ){
              //success
              // redirect user to another page
              window.location.href = '/managerConfirm.php';
            }
            });
       }
        //if validation fails
       else{
          
          //indicate which validation failed
          (validation.username == false) ? $('input[name="account_name"]').addClass('is-invalid') : $('input[name="account_name"]').addClass('is-valid');
          
          (validation.email == false) ? $('input[name="email"]').addClass('is-invalid') : $('input[name="email"]').addClass('is-valid');
          
          (validation.password == false) ? $('input[name="password"]').addClass('is-invalid') : $('input[name="password"]').addClass('is-valid');
          
          (validation.roleId == false) ? $('input[name="roleId"]').addClass('is-invalid') : $('input[name="roleId"]').addClass('is-valid');
          $(event.target).addClass('was-validated');
          
          if( validation.roleId == false || validation.companyId == false ){
              $(event.target).append(`<div class="alert alert-warning">You need to <a href="registerCompany.php?role=3">register</a> a company first</div>`);
          }
          
       }
       
       
    });
});