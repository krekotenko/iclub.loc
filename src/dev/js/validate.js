var Validate = function(params){

    var form = params.form,
        messageResult = params.form.querySelector(params.messageResult),
        messageErrorEmail = params.messageErrorEmail,
        messageErrorForm = params.messageErrorForm,
        messageErrorPass = params.messageErrorPass,
        messageForm = params.messageForm,
        inputs =  form.querySelectorAll('input:required, textarea:required'),
        inputsClear = form.querySelectorAll('input'),
        areaClear = form.querySelectorAll('textarea'),
        email = form.querySelectorAll('input[type=email]'),
        passwords = form.querySelectorAll('input[type=password]'),
        validCount = [],
        validCountPass = [],
        validCountText = [],
        validCountEmail = [],
        patternMail = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

    if(inputs){

        Array.prototype.forEach.call(inputs, function(item) {     
            if(item.value == ''){      
                item.classList.add('is-invalid');    
                validCountText.push(false);               
            } else {
                item.classList.remove('is-invalid'); 
                validCountText.push(true);
            }
        });
    };  

    if(email){
        Array.prototype.forEach.call(email, function(item) {
            if( item.value == '' && !patternMail.test(item.value) ){                
                item.classList.add('is-invalid');  
                validCountEmail.push(false); 
            } else if( item.value != '' && !patternMail.test(item.value) ) {
                item.classList.add('is-invalid');  
                validCountEmail.push(false);
            } else {
                item.classList.remove('is-invalid'); 
                validCountEmail.push(true);
            }
        });        
    };

    if(passwords.length == 2){

        if(passwords[0].value != passwords[1].value || passwords[0].value == '' || passwords[1].value == ''){
            passwords[0].classList.add('is-invalid');
            passwords[1].classList.add('is-invalid');
            validCountPass.push(false);
        } else {
            passwords[0].classList.remove('is-invalid');
            passwords[1].classList.remove('is-invalid');
            validCountPass.push(true);
        }

    };

    isValidText = validCountText.every(function(b){
        return b == true;
    });

    isValidEmail = validCountEmail.every(function(b){
        return b == true;
    });

    isValidPass = validCountPass.every(function(b){
        return b == true;
    });

    if(messageResult) {
        if(!isValidText) {   
            messageResult.classList.remove('result-success');  
            messageResult.classList.add('text-danger');
            messageResult.textContent = messageErrorForm;
        } else if(!isValidEmail) {
            messageResult.classList.remove('result-success');
            messageResult.classList.add('text-danger');
            messageResult.textContent = messageErrorEmail;
        } else if(!isValidPass) {
            messageResult.classList.remove('result-success');
            messageResult.classList.add('text-danger');
            messageResult.textContent = messageErrorPass;
        } else {
            messageResult.classList.remove('text-danger');  
            messageResult.classList.add('text-success');
            messageResult.textContent = messageForm;
        }
    }

    this.clearFields = function() {        
        if(isValidText && isValidEmail && isValidPass){

            if(inputsClear){
                [].forEach.call(inputsClear, function(item){                     
                    if(item.type != 'submit') item.value = '';                                
                });
            }
    
            if(areaClear){
                [].forEach.call(areaClear, function(item){
                    item.value = '';
                });
            }
    
        }
    }

    this.isValid = function(){
        return isValidText && isValidEmail && isValidPass;
    };

    // function sendAjax()  {

    //     xhr = new XMLHttpRequest();
    //     xhr.open('POST', params.path);
    //     xhr.responseType = 'json';
    //     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //     xhr.onload = function() {
    //         if (this.status == 200) {
    //             if(this.response.status == 'success') {
    //                 if(inputsClear){
    //                     [].forEach.call(inputsClear, function(item){                     
    //                         if(item.type != 'submit') item.value = '';                                
    //                     });
    //                 }
    //                 if(areaClear){
    //                     [].forEach.call(areaClear, function(item){
    //                         item.value = '';
    //                     });
    //                 }; 
    //             }
    //         }
    //         else if (xhr.status !== 200) {
    //             //fail
    //         }
    //     };

    //     var urlEncodedData = "";
    //     var urlEncodedDataPairs = [];
    //     var name;

    //     for(name in params.senddata) {
    //         urlEncodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent( params.senddata[name]));
    //     }
    //     urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');
    //     xhr.send(urlEncodedData);

    //     return false;

    // }


};

module.exports = Validate;