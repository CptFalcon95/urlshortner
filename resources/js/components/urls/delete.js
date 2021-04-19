jQuery(function() {
    $('button#delete-url').on('click', function() {
        let currentShortUrl = $(this).data('short-url')
        axios.delete('/urls/'+currentShortUrl)
        .then(res => {
            if(res.data == true) {
                Swal.fire({
                    icon: 'success',
                    title: 'Gelukt!',
                    text: 'De URL is verwijderd',
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
            }
        )
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