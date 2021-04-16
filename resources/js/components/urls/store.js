jQuery(function() {

    $('#url-creation-form').on('submit', function(e) {
        e.preventDefault()

        const token = $('meta[name="csrf-token"]').attr('content')
        const url = '/urls'
        const data = {
            'url' : $('input[name="url"]').val()
        }

        axios.post(url, data)
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
            if (error.response.status == 422) {
                Swal.fire(
                    'Oeps!',
                    error.response.data.errors.url[0],
                    'error'
                )
            }
        })
    })
})