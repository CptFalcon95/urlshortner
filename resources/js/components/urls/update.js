jQuery(function() {

    // Store the short_url from currenty edited URL
    let currentShortUrl

    const $urlEditModal = $('#url-edit-modal')

    // Set modal data when modal is triggered.
    $urlEditModal.on('shown.bs.modal', function (event) {
        // The targeted edit button from URL's table on frontend
        const $button = $(event.relatedTarget)
        // Set currentShortUrl to data-short-url attribute, from current table row edit button
        // And focus on the input after its been filled
        currentShortUrl = $button.data('short-url')
        $('input#edit-url').trigger('focus')
        $('input#edit-url').val($button.data('url'))
        // Manualy set the modal's delete button attribute to shortUrl
        $('button#delete-url').attr('data-short-url', currentShortUrl)
    })

    // Reload page after modal is closed
    $urlEditModal.on('hidden.bs.modal', function (e) {
        location.reload()
    })

    // Update a URL using Ajax when the update form is submitted
    $('#url-edit-form').on('submit', function(e) {
        e.preventDefault()
        
        const url = '/urls/' + currentShortUrl

        axios.put(url, { 'url' : $('input#edit-url').val() })
        .then(res => {
            if(res.data == true) {
                Swal.fire({
                    icon: 'success',
                    title: 'Gelukt!',
                    text: 'De URL is succesvol opgeslagen'
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