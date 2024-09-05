$(document).ready(function () {
    // Function to validate file extensions

    window.validateImage = function (fileInput, type = '') {
        var file = fileInput.files[0];

        // Validate file size
        if (file.size > 2000000) {
            error("File size exceeds 2MB. Please select a smaller file.");
            return false; // Prevent further processing
        }
        var allowedExtensions = '';
        if (type == 'imagepdf') {
            allowedExtensions = ["jpeg", "jpg", "png", "gif", "pdf"];
        } else {
            allowedExtensions = ["jpeg", "jpg", "png", "gif"];
        }

        // Extract file extension
        var fileName = file.name;
        var fileExtension = fileName.split('.').pop().toLowerCase();

        // Validate file extension
        if (!allowedExtensions.includes(fileExtension)) {
            error("Invalid file type. Please select a file with one of the following extensions: " + allowedExtensions.join(", "));
            return false; // Prevent further processing
        }

        // If both validations pass, display file name
        var label = $(fileInput).next('.custom-file-label');
        label.text(fileName);

        return true; // Allow further processing
    }


});
