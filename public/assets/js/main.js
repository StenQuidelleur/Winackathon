const validated = document.getElementById('validated');

validated.addEventListener('click', e => {
    e.preventDefault()
    myMove()
})

myMove = () => {
    var player = document.getElementById('ding');
    var pin = document.getElementById("pin");
    var pulse = document.getElementById("pulse");
    var success = document.getElementById("success");

    var pos = 0;
    var id = setInterval(frame, 10);

    function frame() {
        if (pos == 450) {
            clearInterval(id);
            player.play()
            success.classList.remove('d-none')
            //alert('Le paquet est livré toz !')
        } else if (pos < 450) {
            pos++;
            pin.style.top = pos + 'px';
            pulse.style.top = pos + 'px';
            pin.style.left = pos + 'px';
            pulse.style.left = pos + 'px';
        }

    }
}