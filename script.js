"use strict"

document.addEventListener('DOMContentLoaded', function() {
    const calcForm = document.getElementById('priceCalculating');
    calcForm.addEventListener('submit', formSend);

    async function formSend(e) {
        let formData = new FormData(calcForm);

        let response = await fetch('sendmail.php', {
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