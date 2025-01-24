(() => {
    const inputs = document.querySelectorAll('input[type=text], input[type=email], input[type=url]');

    inputs.forEach(input => {
        console.log(input)

        input.addEventListener('keyup', (event) => {

            const inputValueLength = input.value.length;
            console.log(inputValueLength)

            if ( !(inputValueLength < 2 || inputValueLength > 255) ) return input.nextElementSibling.remove();
            if  (input.nextElementSibling ) return;

            const errorBox = document.createElement('div')
            errorBox.classList.add('input_error');
            errorBox.innerHTML = '<p> tu es d&biule ! </p>';
            input.insertAdjacentElement('afterend', errorBox);

            //TODO: install a composer library to verify email validity and link validity (start it with https or http and malicious)

        })
    })
})()