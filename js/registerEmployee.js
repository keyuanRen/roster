$(document).ready( () => {
    //disable the form button
    // $('button[name="register-btn"]').attr('disabled','true');
    //add a listener to form
    $('#employee-register-form').submit( (event) => {
       event.preventDefault();
       //get values
       let username = $('input[name="account_name"]').val();
       let email = $('input[name="email"]').val();
       let password = $('input[name="password"]').val();
       let roleId = $('input[name="roleId"]').val();
       let accessCode = $('input[name="accessCode"]').val();
       
       //simply validate the form data
       let validation = {};
       //validate username
       validation.username = (username.length >= 6 && username.length < 16) ? true :  false;
       //validate email
       validation.email = (email.length > 0 && email.indexOf('@') > 0 ) ? true : false;
       //validate password
       validation.password = (password.length >= 6) ?  true : false;
       //validate roleId
       validation.roleId = (parseInt(roleId) > 0 && parseInt(roleId) > 3) ?  true : false;
       //validate access code
       validation.accessCode = (accessCode.length==6) ?  true : false;
       console.log
       //if all validation is true
        if( validation.username && 
           validation.email && 
           validation.password && 
           validation.roleId && 
           validation.accessCode 
        )
        {
          //create data
          let employeeData = {
              account_name: username, 
              email: email, 
              password: password, 
              roleId: roleId, 
              accessCode: accessCode 
              
          };
          // send data to server
          $.ajax({
            url: '/ajax/registeremployee.ajax.php',
            method: 'post',
            dataType: 'json',
            data: employeeData
          })
          .done( (response) => {
            if( response.success == true ){
              //success
              // redirect user to another page
              window.href.location = '/employee.php';
            }
          });
       }
        //if validation fails
       else{
          //indicate which validation fails
          
       }
       
       
    });
});