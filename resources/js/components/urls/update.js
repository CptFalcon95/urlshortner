jQuery(function() {

    // Store the short_url from currenty edited URL
    let currentShortUrl;

    // Set modal data when modal is triggered.
    $('#url-edit-modal').on('shown.bs.modal', function (event) {
        // The targeted edit button from URL's table on frontend
        const $button = $(event.relatedTarget)
        // Set currentShortUrl to data-short-url attribute, from current table row edit button
        currentShortUrl = $button.data('short-url')
        $('input#edit-url').trigger('focus')
        $('input#edit-url').val($button.data('url'))
        // Manualy set the modal's delete button attribute to shortUrl
        $('button#delete-url').attr('data-short-url', shortUrl)
    })

    // 
    $('#url-edit-form').on('submit', function(e) {
        e.preventDefault()
        
        const url = '/urls/' + currentShortUrl

        axios.put(url, { 'url' : $('input#edit-url').val() })
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