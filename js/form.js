$(function() {
    // Get the form.
    var form = $('#ajax-contact');

    // Get the messages div.
    var formMessages = $('#form-messages');

    // Set up an event listener for the contact form.
    form.submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        // Get the form data.
        var formData = new FormData(form[0]);

        // Simulate form submission and handle response.
        setTimeout(function() {
            // For demonstration purposes, assuming the message was sent successfully.
            var successMessage = 'Your message was successfully sent!';
            showMessage(successMessage, 'success');
        }, 1000); // Simulate a delay for demonstration. Replace with actual AJAX call.

        // Function to display message in the message div.
        function showMessage(message, type) {
            formMessages.removeClass('bg-danger bg-success').addClass('bg-' + type).text(message);
            clearForm();
        }

        // Function to clear the form fields.
        function clearForm() {
            form[0].reset();
        }
    });
});
