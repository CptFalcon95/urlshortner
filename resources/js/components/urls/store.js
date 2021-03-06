jQuery(function() {

    $('#url-creation-form').on('submit', function(e) {
        e.preventDefault()

        axios.post('/urls', { 'url' : $('input[name="url"]').val() })
        .then(res => {
            if(res.data == true) {
                Swal.fire({
                    icon: 'success',
                    title: 'Gelukt!',
                    text: 'De URL is succesvol opgeslagen',
                    onClose : () => {
                        location.reload()
                    }
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oeps...',
                    text: 'Er ging iets fout, probeer het nog een keer'
                })
            }
        })
        .catch(error => {
            if (error.response.status === 422) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oeps...',
                    text: error.response.data.errors.url[0]
                })
            }
        })
    })
})