function abrirModal(userId) {
    const modal = document.getElementById('modal');
    modal.style.display = 'block';

    const submit = document.getElementById('submit');
    const cancel = document.getElementById('cancel');

    submit.onclick = function () {
        modal.style.display = 'none';
        document.getElementById('loading').style.display = 'block';

        setTimeout(function () {
            window.location.href = `user/excluir.php?id=${userId}`;
        }, 1000);
    };

    cancel.onclick = function () {
        modal.style.display = 'none';
    };
}