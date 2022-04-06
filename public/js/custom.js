$(document).ready(function () {
    var array_input = ['input[name="age"]', 'input[name="height"]', 'input[name="weight"]', 'input[name="email"]', 'input[name="inc"]', 'input[name="ft"]'];
    $(array_input.join(','))
    .on('focusout',function() {
        var name = $(this).attr('name');
        var value = $(this).val();
        localStorage.setItem('input[name="'+name+'"]', value);
    });

    $.each(array_input, function(index, value) {
        $(value).val(localStorage.getItem(value));
    })

    
    $('.female-btn, .male-btn').on('click', function() {
        localStorage.setItem('sex', $(this).attr('data-sx'));
    });

    $('.quiz-btn').on('click', function (e) {
        let system = this.getAttribute('data-system');
        $('.quiz-btn').removeClass('active');
        $(this).addClass('active');
        if(system == 0){
            $('.imperial').css('display', 'block');
            $('.metric').css('display', 'none');
        }else if(system == 1){
            $('.metric').css('display', 'block');
            $('.imperial').css('display', 'none');
        }
        $('input[name="system_of_units"]').val(system);
    });


    $('form.quiz__form').on('submit', function (e) {
        e.preventDefault();
        var __this = $(this);
        var action = __this.attr('action');
        var method = __this.attr('method');
        var formData = __this.serialize();
        $.ajax({
            url: action,
            type: method,
            data: formData,
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                steps(false);
            },
            error: function (msg) {
                if(msg.responseJSON.errors){
                    var errors = msg.responseJSON.errors;
                    var array_errors = [];
                    $.each(errors, function(index, value) {
                        array_errors.push({ name: index, text : value[0]});
                    });
                    form_quiz_errors(array_errors);
                }else{
                    console.log(msg.responseText);
                }
            }
        });        
    });

    $('.step .radio-button').on('click', function() {
        steps($(this));
    });

    function steps(__this)
    {
        var this_step = $('.step.active');
        this_step.removeClass('active');

        var next_step = this_step.next('.step');
        next_step.addClass('active');

        if(__this){
            get_select_result(__this);
        }

        if(next_step.length === 0){
            end_steps_function();
            return;
        }
        
    }

    var list_result = {
        testresult: [

        ]
    };
    function end_steps_function()
    {
        send_result_user();
    }
    
    function get_select_result(this_select)
    {
        var question = this_select.attr('data-question');
        var answer = this_select.attr('data-answer');
        list_result.testresult.push({ question: question, answer: answer});
    }

    function form_quiz_errors(array_errors)
    {
        var errors_container = $('#errors ul');
        errors_container.html('');
        $.each(array_errors, function(index, value) {
            errors_container.append('<li>'+value.text+'</li>');
            console.log(value);
        });
        errors_container.parent().css('display', 'block');
    }

    function send_result_user(){
        console.log(list_result);
        $.ajax({
            url: 'quiz/savetest',
            type: 'POST',
            data: JSON.stringify(list_result),
            dataType: 'json',
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json'
            },
            success: function (data) {
                location.href = '/keto';
            },
            error: function (msg) {

            }
        }); 
    }

});