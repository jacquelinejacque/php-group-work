const form=document.getElementById('form');
const name=document.getElementById('username');
const password=document.getElementById('pass');
const errorElement=document.getElementById('error');

form.addEventListener('submit',(e)=>{
    let messages=[];
    if(username.value.trim()=='' || username.value.trim()==null){
        messages.push("Username is required")
    }
    else if(pass.value.trim()=='' || pass.value.trim()==null){
        messages.push("password is required")
    }    

    else if (pass.value.length<=6){
        messages.push('password must be longer than 6 characters');
    }
    else if(pass.value.length>=10){
        messages.push("password must be less than 10 characters")
    }
    else if(pass==password){
        messages.push("password cannot be password");
    }    
    if(messages.length>0){
        e.preventDefault();
        errorElement.toggleAttribute("hidden");
        errorElement.innerText=messages.join(',')
    }
    
    
    
});