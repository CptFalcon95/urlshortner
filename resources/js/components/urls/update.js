jQuery(function() {

    let shortUrl

    // Set modal data when modal is triggered.
    $('#url-edit-modal').on('shown.bs.modal', function (event) {
        const $button = $(event.relatedTarget)
        shortUrl = $button.data('short-url')

        $('input#edit-url').trigger('focus')
        $('input#edit-url').val($button.data('url'))
        $('button#delete-url').attr('data-short-url', shortUrl)
    })

    // 
    $('#url-edit-form').on('submit', function(e) {
        e.preventDefault()
        
        const url = '/urls/'+shortUrl
        const data = {
            'url' : $('input#edit-url').val(),
            'short_url' : shortUrl
        }

        axios.put(url, data)
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
                console.log();
                Swal.fire(
                    'Oeps!',
                    error.response.data.errors.url[0],
                    'error'
                )
            }
        })
    })
})