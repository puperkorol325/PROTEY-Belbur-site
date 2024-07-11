"use strict"

document.addEventListener('DOMContentLoaded', function() {
    const feedBackForm = document.getElementById('feedbackForm');
    feedBackForm.addEventListener('submit', formSend);

    async function formSend(e) {
        let formData = new FormData(feedBackForm);

        let response = await fetch('sendmail1.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok){
            let result = await response.json();
            alert(result.message);
        } else {
            alert ("Произошла ошибка отправки! Попробуйте ещё раз.")
        }
    } 
})