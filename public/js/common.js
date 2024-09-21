$(document).ready(function () {
    // Function to validate file extensions
    function clearFileInput(fileInput) {
      $(fileInput).val(''); // Clear the input value
      var label = $(fileInput).next('.custom-file-label');
      label.text('Choose file'); // Reset the label text
  }

    window.validateImage = function (fileInput, type = '') {
        var file = fileInput.files[0];

        // Validate file size
        if (file.size > 2000000) {
            error("File size exceeds 2MB. Please select a smaller file.");
            clearFileInput(fileInput);
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
          clearFileInput(fileInput);
            error("Invalid file type. Please select a file with one of the following extensions: " + allowedExtensions.join(", "));
            return false; // Prevent further processing
        }

        // If both validations pass, display file name
        var label = $(fileInput).next('.custom-file-label');
        label.text(fileName);

        return true; // Allow further processing
    }


});
$(document).ready(function() {  
    $('#examCenterAllotment').click(function(event) {
      event.preventDefault();

      var form = $('#alotmentForm');

      $.ajax({
        url: $(this).attr('href'),
        type: 'post',
        data: form.serialize(),
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          if (response.status) {
            success(response.message);
            location.reload();
          } else {
            error(response.message)
          }
        },
        error: function(xhr) {
          error(xhr.responseText)
        }
      });
    });
  });

  function scholarshipTypesChange(value) {
    console.log('init scholarshipTypesChange')
    let scholarshipCategory = $("#education_name").val();
    console.log("Valur : ", scholarshipCategory);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.post('/administrator/get_scholarship_category', {
      'ids': scholarshipCategory
    }, function(response) {
      console.log("Response:", response);
      if (response.status) {
        var data = response.data;
        if (data != null) {
          $('#board_name_id').empty().append('<option value="">--Select Option--</option>');
          $.each(data, function(index, st) {
            $('#board_name_id').append('<option value="' + st.id + '" >' + st.name + '</option>');
          });
        }
      } else {
        error(response.message); // Ensure error function is defined
      }
    });
  }


  function setMinDateTime() {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    
    // Format the datetime-local value as "YYYY-MM-DDTHH:MM"
    const minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
    
    $('#datetime').attr('min', minDateTime);
}

function validateDateTime() {
    const selectedDateTime = new Date($('#datetimepicker').val());
    const currentDateTime = new Date();

    if (selectedDateTime < currentDateTime) {
        error('The selected date and time cannot be in the past.');
        $('#datetimepicker').val(''); // Clear the invalid input
    }
}

setMinDateTime();

