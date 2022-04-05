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
let user_result = {
    //sex: localStorage.getItem('sex'),
    testresult:[

    ]
};
radio_btn.forEach(item => {
    item.addEventListener('click', event => {
        item.querySelector('input').checked = true;
        user_result.testresult.push({'question': item.dataset.question, 'answer' : item.querySelector('input').value});
        item.classList.add("_active");
        setTimeout(function() { nextStep(); }, 100);
        console.log(user_result);
    })
  })

function nextStep()
{
    var actve_step = document.getElementsByClassName('step active')[0];
    var next_satep = actve_step.nextElementSibling;
    if(!next_satep){
        sendresult();
        return;
    }
    actve_step.classList.remove("active");
    next_satep.classList.add("active");
}

function sendresult()
{
    var request = new XMLHttpRequest();
    const url = 'quiz/savetest'
    request.open("POST", url, true);
    request.responseType =	"json";
    request.setRequestHeader('Content-Type', 'application/json');
    request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
    request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    
    request.addEventListener("readystatechange", () => {
        if (request.readyState == 4 && request.status == 200){
                location.href = '/keto';

        }else{
            console.log('error');
        }
    });
    request.send(JSON.stringify(user_result));
}
