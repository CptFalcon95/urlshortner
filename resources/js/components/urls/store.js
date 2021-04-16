jQuery(function() {

    $('#url-creation-form').on('submit', function(e) {
        e.preventDefault()

        axios.post('/urls', { 'url' : $('input[name="url"]').val() })
        .then(res => {
            if(res.data == true) {
                Swal.fire(
                    'Gelukt!',
                    'De URL is succesvol opgeslagen',
                    'success'
                )
            } else {
                Swal.fire(
                    'Oeps!',
                    'Er ging iets fout, probeer het nog een keer',
                    'error'
                )
            }
        })
        .catch(error => {
            if (error.response.status === 422) {
                Swal.fire(
                    'Oeps!!!',
                    error.response.data.errors.url[0],
                    'error'
                )
            }
        })
    })
})