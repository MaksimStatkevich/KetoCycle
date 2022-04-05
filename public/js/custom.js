const form = document.querySelector('.quiz__form');
form.addEventListener( 'submit', function(e){
    e.preventDefault();
    var inputs = form.elements;

    var request = new XMLHttpRequest();
    const url = form.action
    request.open("POST", url, true);
    request.responseType =	"json";
    request.setRequestHeader('Content-Type', 'application/json');
    request.setRequestHeader("X-CSRF-TOKEN", inputs['_token'].value);
    request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    
    request.addEventListener("readystatechange", () => {
        let obj = request; 
        let html_error_container = document.querySelector('#errors');
        html_error_container.innerHTML = '';
        if (request.readyState == 4 && request.status != 200){
            let errors = obj.response.errors;
            html_error_container.classList.add('active');
            for(var item in errors) {
                let field_name = item;
                let text_error = errors[item][0];
                html_error_container.innerHTML+= '<li>'+text_error+'</li>';
            }

        }else if (request.readyState == 4 && request.status == 200){
            html_error_container.classList.remove('active');
            nextStep();
        }else{
            console.log('error');
        }
    });

    request.send(JSON.stringify({
        age: inputs['age'].value,
        height: inputs['height'].value,
        weight: inputs['weight'].value,
        email: inputs['email'].value
    }));
});

const radio_btn = document.querySelectorAll('.radio-button');

radio_btn.forEach(item => {
    item.addEventListener('click', event => {
        item.classList.add("_active");
        setTimeout(function() { nextStep(); }, 100);
    })
  })

function nextStep()
{
    var actve_step = document.getElementsByClassName('step active')[0];
    var next_step = actve_step.nextElementSibling;
    if(!next_step) return;
    actve_step.classList.remove("active");
    next_step.classList.add("active");
}