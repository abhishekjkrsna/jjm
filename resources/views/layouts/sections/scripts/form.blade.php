<script>
    const form = document.getElementById('{{ $formId }}');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        const response = await fetch('{{ $url }}', {
            method: 'POST',
            body: formData
        });
        const data = await response.json();

        if (response.ok) {
            form.reset();
            document.getElementById('response').innerHTML =
                `<div class="alert alert-success">${data.message}</div>`;
        } else {
            document.getElementById('response').innerHTML =
                `<div class="alert alert-danger">${data.message}</div>`;
        }
    });
</script>
