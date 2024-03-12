<script>
    const district = document.getElementById('district');

    async function getDistricts(state) {
        district.disabled = false;

        try {
            const response = await fetch(`https://vcredil.com/get-district.php?state=${state}`);
            if (response.ok) {
                const data = await response.json();
                let temp = "<option selected disabled hidden>Select District</option>";

                data.forEach(element => {
                    temp += `<option value="${element}">${element}</option>`;
                });

                district.innerHTML = temp;
            } else {
                console.error('Failed to fetch data.');
            }
        } catch (error) {
            console.error('An error occurred:', error);
        }
    }
</script>
